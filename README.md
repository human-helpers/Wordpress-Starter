# Wordpress-Starter

An easy to get started Wordpress starter, with some conventions and helpers baked in.

## Markup and `get_template_part`

- The folder
- use the function
- set args
- use this pattern

Everything in the folder `/template_parts`, are designed to be used with the Wordpress function [get_template_part](https://developer.wordpress.org/reference/functions/get_template_part/).

### A pattern for `$args`

`$args` is the third parameter for `get_template_part`, which lets you pass an array into your template part, this is like [props for Vue](https://v3.vuejs.org/guide/component-props.html#prop-types), or [passing additional variables with include in twig](https://twig.symfony.com/doc/3.x/functions/include.html#:~:text=pass%20additional%20variables%3A).

To clean up how args are used in markup you can use [extract](https://www.php.net/manual/en/function.extract.php) to pull variables out of the array. For example this could be your card component

```
    extract( $args );

    echo "
        <$is class='Card $class'>
            <h$heading_level class='Card__heading'>
                <a href='$url' class='Card__link'>
                    $heading
                </a>
            </h$heading_level>
        </$is>
    ";
```

It's also a good idea to set some default values where possible. In the example above, you probably want some sane defaults for `$is` and `$heading_level`. To do that create an array named defaults and use [array_merge](https://www.php.net/manual/en/function.array-merge.php) to let `$args` override it.

Also make sure to use $defaults to show what `$args` are available using null, false, or an empty string for values you do not have defaults for.

Here is an updated version of our card above with using an array of `$defaults`:

```
    $args = $args ?: [];
    $defaults = [
        'class'         => null,
        'heading'       => null,
        'heading_level' => 2,
        'is'            => 'div',
        'url'           => null,
    ];
    extract( array_merge( $defaults, $args) );

    echo "
        <$is class='Card $class'>
            <h$heading_level class='Card__heading'>
                <a href='$url' class='Card__link'>
                    $heading
                </a>
            </h$heading_level>
        </$is>
    ";
```

### Prettier and using echo for markup

[Prettier is not considered stable with mixed html & php](https://github.com/prettier/plugin-php#can-this-be-used-in-production), but is considered stable with straight php. So try not to mix html and php.

Prettier has no problem with all the markup in php like this:

```
<?php
    $text = 'Get the new widget here';
    $url = '/widgets';
    echo "<a href='$url'>
        $text
    </a>";
?>
```

But prettier doesn't work so great here where we're mixing html & php like this:

```
    <?php
        $text = 'Get the new widget here';
        $url = '/widgets';
    ?>
    <a href='<?php echo $url; ?>'>
        <?php echo $text ?>
    </a>
```

We don't write code for prettier, we write code for users. So if you're in a situation where you need to use HTML outside of php, that's cool. For example [organisms](https://atomicdesign.bradfrost.com/chapter-2/#organisms), [templates](https://atomicdesign.bradfrost.com/chapter-2/#templates), or [pages](https://atomicdesign.bradfrost.com/chapter-2/#pages) might be easier to read with some html outside of the php, that's cool.

If you're building [atoms](https://atomicdesign.bradfrost.com/chapter-2/#atoms) or [molecules](https://atomicdesign.bradfrost.com/chapter-2/#molecules), they should be easy enough to read in an echo statement without needing to resort to using html.

## Functions

Add code that would go in the functions file, in its own file, in the functions directory. If the code is a helper funciton, prefix the file name with `helper-`, if the code sets up some settings, prefix the file name with `settings-`.
