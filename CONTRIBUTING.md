Contributing
---

* [Issues](#issues)
* [Pull Requests](#pull-requests)
* [Testing](#testing)
* [SDK Design](#sdk-design)
    * [Downloading schemas](#downloading-schemas-schemadownload)
    * [Refactoring schemas](#refactoring-schemas-schemarefactor)
    * [Generator control files](#generator-control-files)

We welcome any and all contributions! There are a few ways you can contribute to this project:

* If you find a bug or run into an issue getting set up, please search the [existing issues](https://github.com/jlevers/selling-partner-api/issues), and [open a new issue](https://github.com/jlevers/selling-partner-api/issues/new) if you don't find anything that matches the problem you're having.
* Browse through the existing issues and help people out!
* Submit a [pull request](https://github.com/jlevers/selling-partner-api/pull) if you find an issue and want to fix it yourself!

### Issues

Before submitting an issue, please make sure you search the existing issues to see if anyone else has already reported and/or solved the same problem you're reporting. If you don't find anything that matches your problem, submit a new issue. Please make sure to include:

* The version of the library you're running (you can find this in your `composer.json` file)
* Your complete code, with any credentials removed
* A thorough description of the problem
* Steps to reproduce the problem

### Pull Requests

We welcome PRs! If you want to submit a PR, we encourage you to first submit an issue describing the change you want to make. That way, you don't end up in the frustrating situation of putting a lot of work into a PR only to have us reject it because it's not a change/feature we want to support.

Once you're ready to start work on your PR, please check out the [SDK Design](#sdk-design) section below to make sure your changes conform to the overall design of this library.

Before submitting a PR for review, please ensure the test suite is working with `composer test` and that the code is linted using `composer lint`.

### Testing

You can run the tests with `composer test`. We're using PHPUnit under the hood. Make sure to read the [Saloon testing docs](https://docs.saloon.dev/the-basics/testing), as we use their testing features extensively.

## SDK Design

This SDK is (almost) entirely autogenerated from Amazon's OpenAPI model files, using [highsidelabs/saloon-sdk-autogenerator](https://github.com/highsidelabs/saloon-sdk-autogenerator). As with most big multi-file OpenAPI specifications, the Selling Partner API spec took quite a bit of massaging to get into a format that worked well with an autogenerator. A lot of work was put into making sure that the generation process, from downloading the model files to the generated code, is idempotent and reliable.

There are three major steps to building this library:

1. Downloading the raw OpenAPI schema files from Amazon
2. Editing those files to make their formatting more consistent and usable
3. Generating the final code from the modified OpenAPI schema files

The details of each step are described below. Each of these steps is run via its own CLI command, defined in `bin/console`. The CLI commands accept the following options, both of which can accept multiple values:

* `--category`: The API categories to apply the command to. Options are `seller` and `vendor`.
* `--schema`: The names of the schemas to apply the command to, by their hyphenated names as defined in [`resources/apis.json`](#apisjson).

So, to download the Seller Orders and Merchant Fulfillment APIs, you can run:

```bash
$ php bin/console schema:download \
    --category seller \
    --schema orders --schema merchant-fulfillment
```

### Downloading schemas: `php bin/console schema:download`

This step is the simplest of the three. The `resources/apis.json` is the primary source of truth for what all the different segments of the Selling Partner API are, what their names are, and the URLs of their OpenAPI schema files. There is a more complete description of the `apis.json` file [below](#apisjson).

Downloaded OpenAPI models are placed in `resources/models/raw/<category>/<api-name>/<version>.json`, and are not version controlled. Once the models for a particular API segment have been downloaded, they can then be refactored.

### Refactoring schemas: `php bin/console schema:refactor`

A wide variety of refactoring processes are run on the raw schemas to get them ready to be used in the following step: code generation. The refactoring process code is in `SchemaVersion::refactor()`.

Certain schema changes need to be made manually, because they are too specific or too cumbersome to make in the code. These modifications are defined in the `resources/modifications.json` file, which is explained more thoroughly [below](#modificationsjson).

Once refactoring is complete, the finalized OpenAPI model file is saved to `resources/models/<category>/<api-name>/<version>.json`. These files _are_ version-controlled, unlike the raw models, because having them available to everyone makes it easier to reason about the autogeneration process.

### Generating code

Finally, the code is generated from the finalized OpenAPI models. We use `highsidelabs/saloon-sdk-generator` for this, which handles most of the heavy lifting. All the files in the `SellingPartnerApi\Seller` and `SellingPartnerApi\Vendor` namespaces (and some other files) are autogenerated, so _do not_ edit any of that code directly! Any changes to those files will be overridden the next time the library is generated, so if you want to make a change to any of that code, that change will have to be made by either a) modifying/extending the generator code, or b) via the [`modifications.json`](#modificationsjson) file. Files that are autogenerated have warning comments at the top of the file to indicate that they should not be edited manually.

The `config.json` file provides some basic configuration parameters to the autogenerator, and the files in `src/Generator/Generators` override `highsidelabs/saloon-sdk-generator`'s default file generators. There are several different generator files that can be overridden – you can see all of them [here](https://github.com/highsidelabs/saloon-sdk-generator/tree/master/src/Generators). If you have questions about how to go about extending or modifying the generator files, please [open an issue](https://github.com/highsidelabs/saloon-sdk-generator/issues) in the `highsidelabs/saloon-sdk-generator` repository.

### Generator control files

#### `apis.json`

This file is the source of truth for all API segments, names, versions, and upstream OpenAPI model URLs. The top-level object keys are the two main API categories: `seller` and `vendor`. The general file schema looks like this:

```jsonc
{
    "seller": {
        "api-name": {
            "name": "API Name",
            "versions": [
                {
                    "version": "version-code",
                    "url": "https://raw.githubusercontent.com/path/to/schema.json"
                },
                {
                    "version": "version-code",
                    "url": "https://example.com/schema.html",
                    "selector": "code[data-lang='json']"
                }
            ]
        }
    },
    "vendor": {
        // ...
    }
}
```

#### `modifications.json`

This file contains manually-defined OpenAPI model modifications. These modifications are applied after all other model refactoring steps. Each modification definition has two or three elements:

* `path`, the dot-separated JSON path to the value to be modified in the model file
* `action`, which is one of the following:
    * `replace`: Replaces the value at `path` with the value in the `value` key (see below)
    * `merge`: Combines the value at `path` with the value in the `value` key
    * `delete`: Removes the value at `path` entirely, along with the final key in `path`, from the model
* `value`, the value to merge/replace. Not required if `action` is `delete`