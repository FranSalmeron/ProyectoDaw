<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @ApiPlatform/DataCollector/api-platform.svg */
class __TwigTemplate_507d60b1ce43dc9cda03171aadd455f3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 256.25 419.38\"><g data-name=\"spider\"><g><path d=\"M127.8 99l4.47-5.12L172 141.27l-22.69 38.48a3.83 3.83 0 0 1-5.73-.76l-.71-1.08a3.83 3.83 0 0 1 .71-5l19.72-31.05z\" fill=\"#1d1e1c\"/></g><path d=\"M130.57 102.16s17.64-21 12.76-30.69-7-8.9-14.17-7.75-11.76 5.63-10.73 13.82a40.17 40.17 0 0 0 12.14 24.62z\" fill=\"#1d1e1c\"/><g><path d=\"M118.53 99l-4.47-5.12-39.77 47.39L97 177.74a3.83 3.83 0 0 0 5.73-.76l.71-1.08a3.83 3.83 0 0 0-.71-5L83 141.81z\" fill=\"#1d1e1c\"/></g><path d=\"M115.76 102.16S98.11 81.12 103 71.47s7-8.9 14.17-7.75 11.76 5.63 10.73 13.82a40.17 40.17 0 0 1-12.14 24.62z\" fill=\"#1d1e1c\"/><g><path fill=\"#1d1e1c\" d=\"M132.8 42.02l4.47-5.12 86.77 103.36-54.99 51.39-5.02-4.58 50.31-46.26-81.54-98.79z\"/></g><path d=\"M136.17 45s17.15-26.3 10.29-36.59-9.15-9.15-17.15-6.86-12.58 8-10.31 17.15A45.93 45.93 0 0 0 136.17 45z\" fill=\"#1d1e1c\"/><g><path fill=\"#1d1e1c\" d=\"M113.53 42.02l-4.47-5.12-86.77 103.36 55 51.39 5.01-4.58L32 140.81l81.53-98.79z\"/></g><path d=\"M110.16 45S93 18.7 99.87 8.41 109-.74 117 1.55s12.58 8 10.29 17.15A45.93 45.93 0 0 1 110.16 45z\" fill=\"#1d1e1c\"/><g fill=\"#1d1e1c\"><path d=\"M40.66 321.08L23.67 248.1l31.32.56 1.77 7.43-24.21-.5 15.36 63.08-7.25 2.41z\"/><path d=\"M36.81 331s-6.21 11.73 5.36 16.56 17-5.51 17-5.51.89-4.49-4.79-14.32-7.38-11.9-10.56-12.43-7.01 15.7-7.01 15.7z\"/></g><g fill=\"#1d1e1c\"><path d=\"M21.27 383.93L0 246.05l57.07-25.51-.73 7.59-47.79 22.31L28.9 384l-7.63-.07z\"/><path d=\"M14.57 396.19s-9.28 13 3.75 20.59 21.17-3.84 21.17-3.84 1.78-5.21-3.43-17.83-6.91-15.4-10.63-16.54-10.86 17.62-10.86 17.62z\"/></g><g fill=\"#1d1e1c\"><path d=\"M215.59 320.08l16.99-72.98-31.32.56-1.77 7.43 24.21-.5-15.36 63.08 7.25 2.41z\"/><path d=\"M219.44 330s6.21 11.73-5.36 16.56-17-5.51-17-5.51-.89-4.49 4.79-14.32 7.4-11.93 10.59-12.46 6.98 15.73 6.98 15.73z\"/></g><g fill=\"#1d1e1c\"><path d=\"M234.98 382.93l21.27-137.88-57.07-25.51.73 7.59 47.8 22.31L227.36 383l7.62-.07z\"/><path d=\"M241.68 395.19s9.28 13-3.75 20.59-21.17-3.84-21.17-3.84-1.78-5.21 3.43-17.83 6.91-15.4 10.63-16.54 10.86 17.62 10.86 17.62z\"/></g><g><path d=\"M207.23 219.63c0 41-35.77 62.69-79.9 62.69s-77.67-21.69-77.67-62.69 33.54-71.22 77.67-71.22 79.9 30.22 79.9 71.22z\" fill=\"#d2d2d2\"/><path d=\"M126.33 285.72C103 285.72 83 279.93 68.58 269c-15.46-11.73-23.63-28.79-23.63-49.34 0-38.35 28.14-74.62 81.38-74.62 53.92 0 83.62 36.82 83.62 74.62 0 20.47-8.58 37.54-24.8 49.38-14.78 10.75-35.66 16.68-58.82 16.68zm0-133.91c-49.07 0-74 33.44-74 67.82 0 36.58 28.34 59.3 74 59.3 46.28 0 76.18-23.28 76.18-59.3 0-42.83-41.42-67.82-76.18-67.82z\" fill=\"#1d1e1c\"/></g><g><ellipse cx=\"92.29\" cy=\"165.77\" rx=\"37.55\" ry=\"36.82\" fill=\"#fff\"/><path d=\"M91.29 205c-22 0-39.92-17.59-39.92-39.2s17.91-39.2 39.92-39.2 39.93 17.59 39.93 39.2S113.3 205 91.29 205zm0-73.65c-19.39 0-35.17 15.45-35.17 34.45s15.78 34.45 35.17 34.45 35.17-15.45 35.17-34.45-15.78-34.47-35.17-34.47z\" fill=\"#1d1e1c\"/></g><ellipse cx=\"95.19\" cy=\"167.95\" rx=\"16.99\" ry=\"16.3\" fill=\"#1d1e1c\"/><circle cx=\"92.02\" cy=\"165.04\" r=\"4.68\" fill=\"#fff\"/><g><ellipse cx=\"166.29\" cy=\"171.09\" rx=\"45.51\" ry=\"47.07\" fill=\"#fff\"/><path d=\"M165.29 220.53c-26.41 0-47.89-22.18-47.89-49.44s21.48-49.44 47.89-49.44 47.89 22.18 47.89 49.44-21.48 49.44-47.89 49.44zm0-94.13c-23.78 0-43.14 20-43.14 44.69s19.35 44.69 43.14 44.69 43.13-20 43.13-44.69-19.34-44.69-43.13-44.69z\" fill=\"#1d1e1c\"/></g><circle cx=\"169.13\" cy=\"173.57\" r=\"20.96\" fill=\"#1d1e1c\"/><circle cx=\"180.48\" cy=\"170.39\" r=\"5.78\" fill=\"#fff\"/></g></svg>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ApiPlatform/DataCollector/api-platform.svg";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ApiPlatform/DataCollector/api-platform.svg", "/var/www/html/vendor/api-platform/core/src/Symfony/Bundle/Resources/views/DataCollector/api-platform.svg");
    }
}
