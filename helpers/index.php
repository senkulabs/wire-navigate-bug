<?php

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

if (!function_exists('markdown_convert')) {
    function markdown_convert($file)
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension);

        $converter = new MarkdownConverter($environment);
        return $converter->convert(file_get_contents($file));
    }
}
