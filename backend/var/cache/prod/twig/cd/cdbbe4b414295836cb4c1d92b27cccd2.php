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

/* @ApiPlatform/GraphQlPlayground/index.html.twig */
class __TwigTemplate_c4be9e1ec5a29283bb072d0577f220b4 extends Template
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
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui\">
    <title>";
        // line 6
        if ((($tmp = ($context["title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
            yield " - ";
        }
        yield "API Platform</title>

    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/graphql-playground/index.css", ($context["assetPackage"] ?? null)), "html", null, true);
        yield "\">

    <script src=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/graphql-playground/middleware.js", ($context["assetPackage"] ?? null)), "html", null, true);
        yield "\"></script>
    ";
        // line 12
        yield "    <script id=\"graphql-playground-data\" type=\"application/json\">";
        yield json_encode(($context["graphql_playground_data"] ?? null), 65);
        yield "</script>
</head>

<body>
<style type=\"text/css\">
    html {
        font-family: \"Open Sans\", sans-serif;
        overflow: hidden;
    }

    body {
        margin: 0;
        background: #172a3a;
    }

    .playgroundIn {
        -webkit-animation: playgroundIn 0.5s ease-out forwards;
        animation: playgroundIn 0.5s ease-out forwards;
    }

    @-webkit-keyframes playgroundIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(10px);
            -ms-transform: translateY(10px);
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @keyframes playgroundIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(10px);
            -ms-transform: translateY(10px);
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }
</style>

<style type=\"text/css\">
    .fadeOut {
        -webkit-animation: fadeOut 0.5s ease-out forwards;
        animation: fadeOut 0.5s ease-out forwards;
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @-webkit-keyframes fadeOut {
        from {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
        to {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
        to {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }
    }

    @-webkit-keyframes appearIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(0px);
            -ms-transform: translateY(0px);
            transform: translateY(0px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @keyframes appearIn {
        from {
            opacity: 0;
            -webkit-transform: translateY(0px);
            -ms-transform: translateY(0px);
            transform: translateY(0px);
        }
        to {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @-webkit-keyframes scaleIn {
        from {
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
        }
        to {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes scaleIn {
        from {
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
        }
        to {
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }
    }

    @-webkit-keyframes innerDrawIn {
        0% {
            stroke-dashoffset: 70;
        }
        50% {
            stroke-dashoffset: 140;
        }
        100% {
            stroke-dashoffset: 210;
        }
    }

    @keyframes innerDrawIn {
        0% {
            stroke-dashoffset: 70;
        }
        50% {
            stroke-dashoffset: 140;
        }
        100% {
            stroke-dashoffset: 210;
        }
    }

    @-webkit-keyframes outerDrawIn {
        0% {
            stroke-dashoffset: 76;
        }
        100% {
            stroke-dashoffset: 152;
        }
    }

    @keyframes outerDrawIn {
        0% {
            stroke-dashoffset: 76;
        }
        100% {
            stroke-dashoffset: 152;
        }
    }

    .hHWjkv {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.2222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.2222222222222222s;
    }

    .gCDOzd {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.4222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.4222222222222222s;
    }

    .hmCcxi {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.6222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.6222222222222222s;
    }

    .eHamQi {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.8222222222222223s;
        animation: scaleIn 0.25s linear forwards 0.8222222222222223s;
    }

    .byhgGu {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 1.0222222222222221s;
        animation: scaleIn 0.25s linear forwards 1.0222222222222221s;
    }

    .llAKP {
        -webkit-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        transform-origin: 0px 0px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 1.2222222222222223s;
        animation: scaleIn 0.25s linear forwards 1.2222222222222223s;
    }

    .bglIGM {
        -webkit-transform-origin: 64px 28px;
        -ms-transform-origin: 64px 28px;
        transform-origin: 64px 28px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.2222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.2222222222222222s;
    }

    .ksxRII {
        -webkit-transform-origin: 95.98500061035156px 46.510000228881836px;
        -ms-transform-origin: 95.98500061035156px 46.510000228881836px;
        transform-origin: 95.98500061035156px 46.510000228881836px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.4222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.4222222222222222s;
    }

    .cWrBmb {
        -webkit-transform-origin: 95.97162628173828px 83.4900016784668px;
        -ms-transform-origin: 95.97162628173828px 83.4900016784668px;
        transform-origin: 95.97162628173828px 83.4900016784668px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.6222222222222222s;
        animation: scaleIn 0.25s linear forwards 0.6222222222222222s;
    }

    .Wnusb {
        -webkit-transform-origin: 64px 101.97999572753906px;
        -ms-transform-origin: 64px 101.97999572753906px;
        transform-origin: 64px 101.97999572753906px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 0.8222222222222223s;
        animation: scaleIn 0.25s linear forwards 0.8222222222222223s;
    }

    .bfPqf {
        -webkit-transform-origin: 32.03982162475586px 83.4900016784668px;
        -ms-transform-origin: 32.03982162475586px 83.4900016784668px;
        transform-origin: 32.03982162475586px 83.4900016784668px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 1.0222222222222221s;
        animation: scaleIn 0.25s linear forwards 1.0222222222222221s;
    }

    .edRCTN {
        -webkit-transform-origin: 32.033552169799805px 46.510000228881836px;
        -ms-transform-origin: 32.033552169799805px 46.510000228881836px;
        transform-origin: 32.033552169799805px 46.510000228881836px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-animation: scaleIn 0.25s linear forwards 1.2222222222222223s;
        animation: scaleIn 0.25s linear forwards 1.2222222222222223s;
    }

    .iEGVWn {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 0.3333333333333333s, appearIn 0.1s ease-out forwards 0.3333333333333333s;
        animation: outerDrawIn 0.5s ease-out forwards 0.3333333333333333s, appearIn 0.1s ease-out forwards 0.3333333333333333s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .bsocdx {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 0.5333333333333333s, appearIn 0.1s ease-out forwards 0.5333333333333333s;
        animation: outerDrawIn 0.5s ease-out forwards 0.5333333333333333s, appearIn 0.1s ease-out forwards 0.5333333333333333s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .jAZXmP {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 0.7333333333333334s, appearIn 0.1s ease-out forwards 0.7333333333333334s;
        animation: outerDrawIn 0.5s ease-out forwards 0.7333333333333334s, appearIn 0.1s ease-out forwards 0.7333333333333334s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .hSeArx {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 0.9333333333333333s, appearIn 0.1s ease-out forwards 0.9333333333333333s;
        animation: outerDrawIn 0.5s ease-out forwards 0.9333333333333333s, appearIn 0.1s ease-out forwards 0.9333333333333333s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .bVgqGk {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 1.1333333333333333s, appearIn 0.1s ease-out forwards 1.1333333333333333s;
        animation: outerDrawIn 0.5s ease-out forwards 1.1333333333333333s, appearIn 0.1s ease-out forwards 1.1333333333333333s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .hEFqBt {
        opacity: 0;
        stroke-dasharray: 76;
        -webkit-animation: outerDrawIn 0.5s ease-out forwards 1.3333333333333333s, appearIn 0.1s ease-out forwards 1.3333333333333333s;
        animation: outerDrawIn 0.5s ease-out forwards 1.3333333333333333s, appearIn 0.1s ease-out forwards 1.3333333333333333s;
        -webkit-animation-iteration-count: 1, 1;
        animation-iteration-count: 1, 1;
    }

    .dzEKCM {
        opacity: 0;
        stroke-dasharray: 70;
        -webkit-animation: innerDrawIn 1s ease-in-out forwards 1.3666666666666667s, appearIn 0.1s linear forwards 1.3666666666666667s;
        animation: innerDrawIn 1s ease-in-out forwards 1.3666666666666667s, appearIn 0.1s linear forwards 1.3666666666666667s;
        -webkit-animation-iteration-count: infinite, 1;
        animation-iteration-count: infinite, 1;
    }

    .DYnPx {
        opacity: 0;
        stroke-dasharray: 70;
        -webkit-animation: innerDrawIn 1s ease-in-out forwards 1.5333333333333332s, appearIn 0.1s linear forwards 1.5333333333333332s;
        animation: innerDrawIn 1s ease-in-out forwards 1.5333333333333332s, appearIn 0.1s linear forwards 1.5333333333333332s;
        -webkit-animation-iteration-count: infinite, 1;
        animation-iteration-count: infinite, 1;
    }

    .hjPEAQ {
        opacity: 0;
        stroke-dasharray: 70;
        -webkit-animation: innerDrawIn 1s ease-in-out forwards 1.7000000000000002s, appearIn 0.1s linear forwards 1.7000000000000002s;
        animation: innerDrawIn 1s ease-in-out forwards 1.7000000000000002s, appearIn 0.1s linear forwards 1.7000000000000002s;
        -webkit-animation-iteration-count: infinite, 1;
        animation-iteration-count: infinite, 1;
    }

    #loading-wrapper {
        position: absolute;
        width: 100vw;
        height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .logo {
        width: 75px;
        height: 75px;
        margin-bottom: 20px;
        opacity: 0;
        -webkit-animation: fadeIn 0.5s ease-out forwards;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .text {
        font-size: 32px;
        font-weight: 200;
        text-align: center;
        color: rgba(255, 255, 255, 0.6);
        opacity: 0;
        -webkit-animation: fadeIn 0.5s ease-out forwards;
        animation: fadeIn 0.5s ease-out forwards;
    }

    .dGfHfc {
        font-weight: 400;
    }
</style>
<div id=\"loading-wrapper\">
    <svg class=\"logo\" viewBox=\"0 0 128 128\">
        <title>GraphQL Playground Logo</title>
        <defs>
            <linearGradient id=\"linearGradient-1\" x1=\"4.86%\" x2=\"96.21%\" y1=\"0%\" y2=\"99.66%\">
                <stop stop-color=\"#E00082\" stop-opacity=\".8\" offset=\"0%\"></stop>
                <stop stop-color=\"#E00082\" offset=\"100%\"></stop>
            </linearGradient>
        </defs>
        <g>
            <rect id=\"Gradient\" width=\"127.96\" height=\"127.96\" y=\"1\" fill=\"url(#linearGradient-1)\" rx=\"4\"></rect>
            <path id=\"Border\" fill=\"#E00082\" fill-rule=\"nonzero\" d=\"M4.7 2.84c-1.58 0-2.86 1.28-2.86 2.85v116.57c0 1.57 1.28 2.84 2.85 2.84h116.57c1.57 0 2.84-1.26 2.84-2.83V5.67c0-1.55-1.26-2.83-2.83-2.83H4.67zM4.7 0h116.58c3.14 0 5.68 2.55 5.68 5.7v116.58c0 3.14-2.54 5.68-5.68 5.68H4.68c-3.13 0-5.68-2.54-5.68-5.68V5.68C-1 2.56 1.55 0 4.7 0z\"></path>
            <path class=\"bglIGM\" x=\"64\" y=\"28\" fill=\"#fff\" d=\"M64 36c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8\" style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"ksxRII\" x=\"95.98500061035156\" y=\"46.510000228881836\" fill=\"#fff\" d=\"M89.04 50.52c-2.2-3.84-.9-8.73 2.94-10.96 3.83-2.2 8.72-.9 10.95 2.94 2.2 3.84.9 8.73-2.94 10.96-3.85 2.2-8.76.9-10.97-2.94\"
                  style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"cWrBmb\" x=\"95.97162628173828\" y=\"83.4900016784668\" fill=\"#fff\" d=\"M102.9 87.5c-2.2 3.84-7.1 5.15-10.94 2.94-3.84-2.2-5.14-7.12-2.94-10.96 2.2-3.84 7.12-5.15 10.95-2.94 3.86 2.23 5.16 7.12 2.94 10.96\"
                  style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"Wnusb\" x=\"64\" y=\"101.97999572753906\" fill=\"#fff\" d=\"M64 110c-4.43 0-8-3.6-8-8.02 0-4.44 3.57-8.02 8-8.02s8 3.58 8 8.02c0 4.4-3.57 8.02-8 8.02\"
                  style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"bfPqf\" x=\"32.03982162475586\" y=\"83.4900016784668\" fill=\"#fff\" d=\"M25.1 87.5c-2.2-3.84-.9-8.73 2.93-10.96 3.83-2.2 8.72-.9 10.95 2.94 2.2 3.84.9 8.73-2.94 10.96-3.85 2.2-8.74.9-10.95-2.94\"
                  style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"edRCTN\" x=\"32.033552169799805\" y=\"46.510000228881836\" fill=\"#fff\" d=\"M38.96 50.52c-2.2 3.84-7.12 5.15-10.95 2.94-3.82-2.2-5.12-7.12-2.92-10.96 2.2-3.84 7.12-5.15 10.95-2.94 3.83 2.23 5.14 7.12 2.94 10.96\"
                  style=\"transform: translate(100px, 100px);\"></path>
            <path class=\"iEGVWn\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M63.55 27.5l32.9 19-32.9-19z\"></path>
            <path class=\"bsocdx\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M96 46v38-38z\"></path>
            <path class=\"jAZXmP\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M96.45 84.5l-32.9 19 32.9-19z\"></path>
            <path class=\"hSeArx\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M64.45 103.5l-32.9-19 32.9 19z\"></path>
            <path class=\"bVgqGk\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M32 84V46v38z\"></path>
            <path class=\"hEFqBt\" stroke=\"#fff\" stroke-width=\"4\" stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M31.55 46.5l32.9-19-32.9 19z\"></path>
            <path class=\"dzEKCM\" id=\"Triangle-Bottom\" stroke=\"#fff\" stroke-width=\"4\" d=\"M30 84h70\" stroke-linecap=\"round\"></path>
            <path class=\"DYnPx\" id=\"Triangle-Left\" stroke=\"#fff\" stroke-width=\"4\" d=\"M65 26L30 87\" stroke-linecap=\"round\"></path>
            <path class=\"hjPEAQ\" id=\"Triangle-Right\" stroke=\"#fff\" stroke-width=\"4\" d=\"M98 87L63 26\" stroke-linecap=\"round\"></path>
        </g>
    </svg>
    <div class=\"text\">Loading
        <span class=\"dGfHfc\">API Platform GraphQL Playground</span>
    </div>
</div>

<div id=\"graphql-playground\" />

<script src=\"";
        // line 525
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-graphql-playground.js", ($context["assetPackage"] ?? null)), "html", null, true);
        yield "\"></script>

</body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ApiPlatform/GraphQlPlayground/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  583 => 525,  66 => 12,  62 => 10,  57 => 8,  49 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ApiPlatform/GraphQlPlayground/index.html.twig", "/var/www/html/vendor/api-platform/core/src/Symfony/Bundle/Resources/views/GraphQlPlayground/index.html.twig");
    }
}
