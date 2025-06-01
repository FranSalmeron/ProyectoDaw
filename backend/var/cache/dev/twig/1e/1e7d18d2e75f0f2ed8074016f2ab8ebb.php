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

/* @WebProfiler/Collector/mailer.html.twig */
class __TwigTemplate_4695d00f4356973806cd3e754e0e1ab1 extends Template
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

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'head' => [$this, 'block_head'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/mailer.html.twig"));

        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        yield "    ";
        $context["events"] = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "events", [], "any", false, false, false, 4);
        // line 5
        yield "
    ";
        // line 6
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 6))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "            ";
                yield from $this->load("@WebProfiler/Icon/mailer.svg", 8)->unwrap()->yield($context);
                // line 9
                yield "            <span class=\"sf-toolbar-value\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 9)), "html", null, true);
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 11
            yield "
        ";
            // line 12
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 13
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Queued messages</b>
                <span class=\"sf-toolbar-status\">";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "events", [], "any", false, false, false, 15), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return CoreExtension::getAttribute($this->env, $this->source, ($context["e"] ?? null), "isQueued", [], "method", false, false, false, 15); })), "html", null, true);
                yield "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Sent messages</b>
                <span class=\"sf-toolbar-status\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "events", [], "any", false, false, false, 19), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return  !CoreExtension::getAttribute($this->env, $this->source, ($context["e"] ?? null), "isQueued", [], "method", false, false, false, 19); })), "html", null, true);
                yield "</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 22
            yield "
        ";
            // line 23
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head"));

        // line 28
        yield "    ";
        yield from $this->yieldParentBlock("head", $context, $blocks);
        yield "
    <style type=\"text/css\">
        /* utility classes */
        .m-t-0 { margin-top: 0 !important; }
        .m-t-10 { margin-top: 10px !important; }

        /* basic grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .col {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        /* small tabs */
        .sf-tabs-sm .tab-navigation li {
            font-size: 14px;
            padding: .3em .5em;
        }
    </style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 64
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 65
        yield "    ";
        $context["events"] = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "events", [], "any", false, false, false, 65);
        // line 66
        yield "
    <span class=\"label ";
        // line 67
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 67))) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 68
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/mailer.svg");
        yield "</span>

        <strong>E-mails</strong>
        ";
        // line 71
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 71)) > 0)) {
            // line 72
            yield "            <span class=\"count\">
                <span>";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 73)), "html", null, true);
            yield "</span>
            </span>
        ";
        }
        // line 76
        yield "    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 80
        yield "    ";
        $context["events"] = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "events", [], "any", false, false, false, 80);
        // line 81
        yield "
    <h2>Emails</h2>

    ";
        // line 84
        if ((($tmp =  !Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "messages", [], "any", false, false, false, 84))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 85
            yield "        <div class=\"empty\">
            <p>No emails were sent.</p>
        </div>
    ";
        }
        // line 89
        yield "
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "events", [], "any", false, false, false, 92), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return CoreExtension::getAttribute($this->env, $this->source, ($context["e"] ?? null), "isQueued", [], "method", false, false, false, 92); })), "html", null, true);
        yield "</span>
            <span class=\"label\">Queued</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "events", [], "any", false, false, false, 97), function ($__e__) use ($context, $macros) { $context["e"] = $__e__; return  !CoreExtension::getAttribute($this->env, $this->source, ($context["e"] ?? null), "isQueued", [], "method", false, false, false, 97); })), "html", null, true);
        yield "</span>
            <span class=\"label\">Sent</span>
        </div>
    </div>

    ";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "transports", [], "any", false, false, false, 102));
        foreach ($context['_seq'] as $context["_key"] => $context["transport"]) {
            // line 103
            yield "        <div class=\"card-block\">
            <div class=\"sf-tabs sf-tabs-sm\">
                ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["events"] ?? null), "events", [$context["transport"]], "method", false, false, false, 105));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 106
                yield "                    ";
                $context["message"] = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "message", [], "any", false, false, false, 106);
                // line 107
                yield "                    <div class=\"tab\">
                        <h3 class=\"tab-title\">Email ";
                // line 108
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isQueued", [], "method", false, false, false, 108)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("queued") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("sent via " . $context["transport"]), "html", null, true)));
                yield "</h3>
                        <div class=\"tab-content\">
                            <div class=\"card\">
                                ";
                // line 111
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", true, true, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 112
                    yield "                                    ";
                    // line 113
                    yield "                                    <div class=\"card-block\">
                                        <pre class=\"prewrap\" style=\"max-height: 600px\">";
                    // line 114
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "toString", [], "method", false, false, false, 114), "html", null, true);
                    yield "</pre>
                                    </div>
                                ";
                } else {
                    // line 117
                    yield "                                    ";
                    // line 118
                    yield "                                    <div class=\"card-block\">
                                        <div class=\"sf-tabs sf-tabs-sm\">
                                            <div class=\"tab\">
                                                <h3 class=\"tab-title\">Headers</h3>
                                                <div class=\"tab-content\">
                                                    <span class=\"label\">Subject</span>
                                                    <h2 class=\"m-t-10\">";
                    // line 124
                    yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, true, false, 124), "get", ["subject"], "method", false, true, false, 124), "bodyAsString", [], "method", true, true, false, 124) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 124), "get", ["subject"], "method", false, false, false, 124), "bodyAsString", [], "method", false, false, false, 124)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 124), "get", ["subject"], "method", false, false, false, 124), "bodyAsString", [], "method", false, false, false, 124), "html", null, true)) : ("(empty)"));
                    yield "</h2>
                                                    <div class=\"row\">
                                                        <div class=\"col col-4\">
                                                            <span class=\"label\">From</span>
                                                            <pre class=\"prewrap\">";
                    // line 128
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, true, false, 128), "get", ["from"], "method", false, true, false, 128), "bodyAsString", [], "method", true, true, false, 128) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 128), "get", ["from"], "method", false, false, false, 128), "bodyAsString", [], "method", false, false, false, 128)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 128), "get", ["from"], "method", false, false, false, 128), "bodyAsString", [], "method", false, false, false, 128)) : ("(empty)")), ["From:" => ""]), "html", null, true);
                    yield "</pre>

                                                            <span class=\"label\">To</span>
                                                            <pre class=\"prewrap\">";
                    // line 131
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, true, false, 131), "get", ["to"], "method", false, true, false, 131), "bodyAsString", [], "method", true, true, false, 131) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 131), "get", ["to"], "method", false, false, false, 131), "bodyAsString", [], "method", false, false, false, 131)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 131), "get", ["to"], "method", false, false, false, 131), "bodyAsString", [], "method", false, false, false, 131)) : ("(empty)")), ["To:" => ""]), "html", null, true);
                    yield "</pre>
                                                        </div>
                                                        <div class=\"col\">
                                                            <span class=\"label\">Headers</span>
                                                            <pre class=\"prewrap\">";
                    // line 135
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "headers", [], "any", false, false, false, 135), "all", [], "any", false, false, false, 135), function ($__header__) use ($context, $macros) { $context["header"] = $__header__; return !CoreExtension::inFilter((((CoreExtension::getAttribute($this->env, $this->source, $context["header"], "name", [], "any", true, true, false, 135) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["header"], "name", [], "any", false, false, false, 135)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["header"], "name", [], "any", false, false, false, 135)) : ("")), ["Subject", "From", "To"]); }));
                    foreach ($context['_seq'] as $context["_key"] => $context["header"]) {
                        // line 136
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["header"], "toString", [], "any", false, false, false, 136), "html", null, true);
                        yield "
";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['header'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 137
                    yield "</pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ";
                    // line 142
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "htmlBody", [], "any", true, true, false, 142)) {
                        // line 143
                        yield "                                                ";
                        // line 144
                        yield "                                                ";
                        $context["htmlBody"] = CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "htmlBody", [], "method", false, false, false, 144);
                        // line 145
                        yield "                                                ";
                        if ((($tmp =  !(null === ($context["htmlBody"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 146
                            yield "                                                    <div class=\"tab\">
                                                        <h3 class=\"tab-title\">HTML Preview</h3>
                                                        <div class=\"tab-content\">
                                                            <pre class=\"prewrap\" style=\"max-height: 600px\">
                                                                <iframe
                                                                    src=\"data:text/html;charset=utf-8;base64,";
                            // line 151
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "base64Encode", [($context["htmlBody"] ?? null)], "method", false, false, false, 151), "html", null, true);
                            yield "\"
                                                                    style=\"height: 80vh;width: 100%;\"
                                                                >
                                                                </iframe>
                                                            </pre>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab\">
                                                        <h3 class=\"tab-title\">HTML Content</h3>
                                                        <div class=\"tab-content\">
                                                            <pre class=\"prewrap\" style=\"max-height: 600px\">";
                            // line 162
                            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "htmlCharset", [], "method", false, false, false, 162)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                // line 163
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::convertEncoding(($context["htmlBody"] ?? null), "UTF-8", CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "htmlCharset", [], "method", false, false, false, 163)), "html", null, true);
                            } else {
                                // line 165
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["htmlBody"] ?? null), "html", null, true);
                            }
                            // line 167
                            yield "</pre>
                                                        </div>
                                                    </div>
                                                ";
                        }
                        // line 171
                        yield "                                                ";
                        $context["textBody"] = CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "textBody", [], "method", false, false, false, 171);
                        // line 172
                        yield "                                                ";
                        if ((($tmp =  !(null === ($context["textBody"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 173
                            yield "                                                    <div class=\"tab\">
                                                        <h3 class=\"tab-title\">Text Content</h3>
                                                        <div class=\"tab-content\">
                                                            <pre class=\"prewrap\" style=\"max-height: 600px\">";
                            // line 177
                            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "textCharset", [], "method", false, false, false, 177)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                                // line 178
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::convertEncoding(($context["textBody"] ?? null), "UTF-8", CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "textCharset", [], "method", false, false, false, 178)), "html", null, true);
                            } else {
                                // line 180
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["textBody"] ?? null), "html", null, true);
                            }
                            // line 182
                            yield "</pre>
                                                        </div>
                                                    </div>
                                                ";
                        }
                        // line 186
                        yield "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "attachments", [], "any", false, false, false, 186));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                            // line 187
                            yield "                                                    <div class=\"tab\">
                                                        <h3 class=\"tab-title\">Attachment #";
                            // line 188
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 188), "html", null, true);
                            yield "</h3>
                                                        <div class=\"tab-content\">
                                                            <pre class=\"prewrap\" style=\"max-height: 600px\">";
                            // line 190
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["attachment"], "toString", [], "method", false, false, false, 190), "html", null, true);
                            yield "</pre>
                                                        </div>
                                                    </div>
                                                ";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 194
                        yield "                                            ";
                    }
                    // line 195
                    yield "                                            <div class=\"tab\">
                                                <h3 class=\"tab-title\">Parts Hierarchy</h3>
                                                <div class=\"tab-content\">
                                                    <pre class=\"prewrap\" style=\"max-height: 600px\">";
                    // line 198
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "body", [], "method", false, false, false, 198), "asDebugString", [], "method", false, false, false, 198), "html", null, true);
                    yield "</pre>
                                                </div>
                                            </div>
                                            <div class=\"tab\">
                                                <h3 class=\"tab-title\">Raw</h3>
                                                <div class=\"tab-content\">
                                                    <pre class=\"prewrap\" style=\"max-height: 600px\">";
                    // line 204
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["message"] ?? null), "toString", [], "method", false, false, false, 204), "html", null, true);
                    yield "</pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
                }
                // line 210
                yield "                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 214
            yield "            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['transport'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Collector/mailer.html.twig";
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
        return array (  509 => 214,  500 => 210,  491 => 204,  482 => 198,  477 => 195,  474 => 194,  456 => 190,  451 => 188,  448 => 187,  430 => 186,  424 => 182,  421 => 180,  418 => 178,  416 => 177,  411 => 173,  408 => 172,  405 => 171,  399 => 167,  396 => 165,  393 => 163,  391 => 162,  378 => 151,  371 => 146,  368 => 145,  365 => 144,  363 => 143,  361 => 142,  354 => 137,  346 => 136,  342 => 135,  335 => 131,  329 => 128,  322 => 124,  314 => 118,  312 => 117,  306 => 114,  303 => 113,  301 => 112,  299 => 111,  293 => 108,  290 => 107,  287 => 106,  283 => 105,  279 => 103,  275 => 102,  267 => 97,  259 => 92,  254 => 89,  248 => 85,  246 => 84,  241 => 81,  238 => 80,  228 => 79,  219 => 76,  213 => 73,  210 => 72,  208 => 71,  202 => 68,  198 => 67,  195 => 66,  192 => 65,  182 => 64,  138 => 28,  128 => 27,  117 => 23,  114 => 22,  107 => 19,  100 => 15,  96 => 13,  94 => 12,  91 => 11,  84 => 9,  81 => 8,  78 => 7,  76 => 6,  73 => 5,  70 => 4,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/mailer.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/mailer.html.twig");
    }
}
