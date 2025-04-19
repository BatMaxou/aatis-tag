# Aatis Tag

## Installation

```bash
composer require aatis/tag
```

## Dependencies

- `aatis/parameter-bag` (https://github.com/BatMaxou/aatis-parameter-bag)

## Usage

This package is made to be extendable and fit all your needs. Be free to add your own logic to those components.

### Tag

Simple component composed of a name and optional carried data stored into a `ParameterBag`. A tag implements the `Stringable` interface by default, the string representation follow the pattern `${suffix}${name}`.

> [!NOTE]
> Out of the box, the suffix is set to `@tag_` but you can extend it and set the constant `TAG_SUFFIX` to your preferrence.

```php
class CustomTag extends Tag
{
    public const TAG_SUFFIX = '@custom_suffix_';
}
```

### Builder

The `TagBuilder` service externalizes the logic of tag creation. It provide a `buildFromName` method to generate the string representation of a tag based on a string. It also accept a optional array of `BackedEnum` tag options.

This package include a `TagOption` enum which provide the following options:

- `BUILD_OBJECT` : Ask the builder to return the `Tag` instance instead of it string representation.

> [!NOTE]
> With an extended tag, you may want to create a builder associated to it and define other methods and options to create your own tags.
> You can do this by extending the `TagBuilder` service and overriding the protected `newTag` method.

```php
/**
 * @extends TagBuilder<CustomTag>
 */
class CustomTagBuilder extends TagBuilder
{
    /**
     * @param \BackedEnum[] $options
     *
     * @return ServiceTag[]|string[]
     */
    public function buildFromSomething(mixed $something, $options = []): array
    {
        // Your logic here
    }

    /**
     * @param \BackedEnum[] $options
     *
     * @return ServiceTag[]|string[]
     */
    public function buildFromSomethingWithOption(mixed $something, $options = []): array
    {
        if (in_array(CustomTagOption::CUSTOM_OPTION, $options)) {
            // Your logic here
        } else {
            // Your logic here
        } 
    }

    protected function newTag(array $options): CustomTag
    {
        // Your logic here
    }
}

```
