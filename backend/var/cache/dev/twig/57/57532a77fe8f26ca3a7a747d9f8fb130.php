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

/* @ApiPlatform/DataCollector/request_legacy.html.twig */
class __TwigTemplate_5da9eea5ced74788d3bf894a9bfbdab0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/DataCollector/request_legacy.html.twig"));

        // line 77
        $macros["apiPlatform"] = $this->macros["apiPlatform"] = $this;
        // line 1
        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 80
        yield "    ";
        $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 81
            yield "        ";
            $context["status_color"] = (((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counters", [], "any", false, true, false, 81), "ignored_filters", [], "any", true, true, false, 81)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counters", [], "any", false, false, false, 81), "ignored_filters", [], "any", false, false, false, 81), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yellow") : ("default"));
            // line 82
            yield "        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@ApiPlatform/DataCollector/api-platform-icon.svg");
            yield "
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 84
        yield "
    ";
        // line 85
        $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 86
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "version", [], "any", false, false, false, 86)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 87
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Version</b>
                <span>";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "version", [], "any", false, false, false, 89), "html", null, true);
                yield "</span>
            </div>
        ";
            }
            // line 92
            yield "        <div class=\"sf-toolbar-info-piece\">
            <b>Resource Class</b>
            <span>";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", [], "any", true, true, false, 94)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", [], "any", false, false, false, 94), "Not an API Platform resource")) : ("Not an API Platform resource")), "html", null, true);
            yield "</span>
        </div>
        ";
            // line 96
            if ((($tmp = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counters", [], "any", false, true, false, 96), "ignored_filters", [], "any", true, true, false, 96)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counters", [], "any", false, false, false, 96), "ignored_filters", [], "any", false, false, false, 96), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 97
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Ignored Filters</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counters", [], "any", false, false, false, 99), "ignored_filters", [], "any", false, false, false, 99), "html", null, true);
                yield "</span>
            </div>
        ";
            }
            // line 102
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 103
        yield "
    ";
        // line 104
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => true, "status" => ($context["status_color"] ?? null)]);
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 108
        yield "    ";
        // line 109
        yield "    <span class=\"label";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("") : (" disabled"));
        yield "\">
        <span class=\"icon\">
            ";
        // line 111
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@ApiPlatform/DataCollector/api-platform.svg");
        yield "
        </span>
        <strong>API Platform</strong>
    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 117
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 118
        yield "    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceClass", [], "any", false, false, false, 120), "Not an API Platform resource")) : ("Not an API Platform resource")), "html", null, true);
        yield "</span>
            <span class=\"label\">Resource class</span>
        </div>
    </div>

    ";
        // line 125
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceMetadata", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 126
            yield "        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Resource Metadata</h3>
                <div class=\"tab-content\">
                    <h3>Short name: \"";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceMetadata", [], "any", false, false, false, 130), "shortName", [], "any", false, false, false, 130), "html", null, true);
            yield "\"</h3>
                    ";
            // line 131
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_operationTable", $context, 131, $this->getSourceContext())->macro_operationTable(...[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceMetadata", [], "any", false, false, false, 131), "itemOperations", [], "any", false, false, false, 131), "item", ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", [], "any", false, true, false, 131), "item_operation_name", [], "any", true, true, false, 131)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", [], "any", false, false, false, 131), "item_operation_name", [], "any", false, false, false, 131), "")) : (""))]);
            yield "
                    ";
            // line 132
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_operationTable", $context, 132, $this->getSourceContext())->macro_operationTable(...[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceMetadata", [], "any", false, false, false, 132), "collectionOperations", [], "any", false, false, false, 132), "collection", ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", [], "any", false, true, false, 132), "collection_operation_name", [], "any", true, true, false, 132)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestAttributes", [], "any", false, false, false, 132), "collection_operation_name", [], "any", false, false, false, 132), "")) : (""))]);
            yield "
                    <table>
                        <thead>
                            <tr>
                                <th scope=\"col\" class=\"key\">Filters</th>
                                <th scope=\"col\"></th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "filters", [], "any", false, false, false, 141));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["id"] => $context["filter"]) {
                // line 142
                yield "                                ";
                $context["ignored_filter"] = ($context["filter"] === null);
                // line 143
                yield "                                <tr";
                if ((($tmp = ($context["ignored_filter"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield " class=\"status-warning\"";
                }
                yield ">
                                    <td>
                                        ";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["id"], "html", null, true);
                yield "
                                        ";
                // line 146
                if ((($tmp = ($context["ignored_filter"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 147
                    yield "                                            <span class=\"newline text-muted\">ignored filter</span>
                                        ";
                } else {
                    // line 149
                    yield "                                            ";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\DumpExtension']->dump($this->env, $context, $context["filter"]);
                    yield "
                                        ";
                }
                // line 151
                yield "                                    </td>
                                </tr>
                            ";
                $context['_iterated'] = true;
            }
            // line 153
            if (!$context['_iterated']) {
                // line 154
                yield "                                <tr>
                                    <td class=\"text-muted\">
                                        No available filter declared for this resource.
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['id'], $context['filter'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            yield "                        </tbody>
                    </table>

                    <table>
                        <thead>
                            <tr>
                                <th scope=\"col\" class=\"key\">Attributes</th>
                                <th scope=\"col\"></th>
                            </tr>
                        </thead>

                        <tbody>
                            ";
            // line 172
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "resourceMetadata", [], "any", false, false, false, 172), "attributes", [], "any", false, false, false, 172));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 173
                yield "                                ";
                if (($context["key"] != "filters")) {
                    // line 174
                    yield "                                    <tr>
                                        <th scope=\"row\">";
                    // line 175
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["key"], "html", null, true);
                    yield "</th>
                                        <td>";
                    // line 176
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["value"], 2);
                    yield "</td>
                                    </tr>
                                ";
                }
                // line 179
                yield "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            yield "                        </tbody>
                    </table>
                </div>
            </div>
            <div class=\"tab\">
                <h3 class=\"tab-title\">Data Providers</h3>
                <div class=\"tab-content\">
                    ";
            // line 187
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_providerTable", $context, 187, $this->getSourceContext())->macro_providerTable(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "collectionDataProviders", [], "any", false, false, false, 187), "collection data provider"]);
            yield "
                    ";
            // line 188
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_providerTable", $context, 188, $this->getSourceContext())->macro_providerTable(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "itemDataProviders", [], "any", false, false, false, 188), "item data provider"]);
            yield "
                    ";
            // line 189
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_providerTable", $context, 189, $this->getSourceContext())->macro_providerTable(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "subresourceDataProviders", [], "any", false, false, false, 189), "subresource data provider"]);
            yield "
                </div>
            </div>
            <div class=\"tab\">
                <h3 class=\"tab-title\">Data Persisters</h3>
                <div class=\"tab-content\">
                    ";
            // line 195
            yield $macros["apiPlatform"]->getTemplateForMacro("macro_providerTable", $context, 195, $this->getSourceContext())->macro_providerTable(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "dataPersisters", [], "any", false, false, false, 195), "data persister"]);
            yield "
                </div>
            </div>
        </div>
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
    public function macro_operationLine($key = null, $operation = null, $actualOperationName = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "key" => $key,
            "operation" => $operation,
            "actualOperationName" => $actualOperationName,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "operationLine"));

            // line 4
            yield "    <tr>
        <th scope=\"row\"";
            // line 5
            if ((($context["key"] ?? null) == ($context["actualOperationName"] ?? null))) {
                yield " class=\"status-success\"";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["key"] ?? null), "html", null, true);
            yield "</th>
        <td";
            // line 6
            if ((($context["key"] ?? null) == ($context["actualOperationName"] ?? null))) {
                yield " class=\"status-success\"";
            }
            yield ">";
            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, ($context["operation"] ?? null), 1);
            yield "</td>
    </tr>
";
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 10
    public function macro_operationTable($object = null, $name = null, $actualOperationName = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "object" => $object,
            "name" => $name,
            "actualOperationName" => $actualOperationName,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "operationTable"));

            // line 11
            yield "    ";
            $macros["apiPlatform"] = $this;
            // line 12
            yield "    <table>
        <thead>
            <tr>
                <th scope=\"col\" class=\"key\">";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ($context["name"] ?? null)), "html", null, true);
            yield " operations</th>
                <th scope=\"col\">Attributes</th>
            </tr>
        </thead>

        <tbody>
        ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["object"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["key"] => $context["itemOperation"]) {
                // line 22
                yield "            ";
                yield $macros["apiPlatform"]->getTemplateForMacro("macro_operationLine", $context, 22, $this->getSourceContext())->macro_operationLine(...[$context["key"], $context["itemOperation"], ($context["actualOperationName"] ?? null)]);
                yield "
        ";
                $context['_iterated'] = true;
            }
            // line 23
            if (!$context['_iterated']) {
                // line 24
                yield "            <tr>
                <td colspan=\"2\" class=\"text-muted\">
                    No available ";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["name"] ?? null)), "html", null, true);
                yield " operation for this resource.
                </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['itemOperation'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "        </tbody>
    </table>
";
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 34
    public function macro_providerTable($object = null, $name = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "object" => $object,
            "name" => $name,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "providerTable"));

            // line 35
            yield "    ";
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["object"] ?? null), "responses", [], "any", false, false, false, 35))) {
                // line 36
                yield "        <div class=\"empty\">
            <p>No calls to ";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
                yield " have been recorded.</p>
        </div>
    ";
            } else {
                // line 40
                yield "        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Answer</th>
                <th>";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ($context["name"] ?? null)), "html", null, true);
                yield "</th>
            </tr>
            </thead>
            <tbody>
            ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["object"] ?? null), "responses", [], "any", false, false, false, 49));
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
                foreach ($context['_seq'] as $context["class"] => $context["answer"]) {
                    // line 50
                    yield "                <tr>
                    <td class=\"font-normal text-small text-muted nowrap\">";
                    // line 51
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 51), "html", null, true);
                    yield "</td>
                    <td class=\"font-normal\">
                        ";
                    // line 53
                    if (($context["answer"] === true)) {
                        // line 54
                        yield "                            <span class=\"label status-success same-width\">TRUE</span>
                        ";
                    } elseif ((                    // line 55
$context["answer"] === false)) {
                        // line 56
                        yield "                            <span class=\"label status-error same-width\">FALSE</span>
                        ";
                    } else {
                        // line 58
                        yield "                            <span class=\"label status-info same-width\">NOT USED</span>
                        ";
                    }
                    // line 60
                    yield "                    </td>
                    <td class=\"font-normal\">";
                    // line 61
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["class"], "html", null, true);
                    yield "</td>
                </tr>
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
                unset($context['_seq'], $context['class'], $context['answer'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                yield "            </tbody>
            ";
                // line 65
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["object"] ?? null), "context", [], "any", true, true, false, 65)) {
                    // line 66
                    yield "                <tfoot>
                    <tr>
                        <td class=\"font-normal\" colspan=\"2\"></td>
                        <td class=\"font-normal\">Context";
                    // line 69
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["object"] ?? null), "context", [], "any", false, false, false, 69), 2);
                    yield "</td>
                    </tr>
                </tfoot>
            ";
                }
                // line 73
                yield "        </table>
    ";
            }
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ApiPlatform/DataCollector/request_legacy.html.twig";
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
        return array (  589 => 73,  582 => 69,  577 => 66,  575 => 65,  572 => 64,  555 => 61,  552 => 60,  548 => 58,  544 => 56,  542 => 55,  539 => 54,  537 => 53,  532 => 51,  529 => 50,  512 => 49,  505 => 45,  498 => 40,  492 => 37,  489 => 36,  486 => 35,  470 => 34,  459 => 30,  449 => 26,  445 => 24,  443 => 23,  436 => 22,  431 => 21,  422 => 15,  417 => 12,  414 => 11,  397 => 10,  381 => 6,  373 => 5,  370 => 4,  353 => 3,  339 => 195,  330 => 189,  326 => 188,  322 => 187,  313 => 180,  307 => 179,  301 => 176,  297 => 175,  294 => 174,  291 => 173,  287 => 172,  273 => 160,  262 => 154,  260 => 153,  254 => 151,  248 => 149,  244 => 147,  242 => 146,  238 => 145,  230 => 143,  227 => 142,  222 => 141,  210 => 132,  206 => 131,  202 => 130,  196 => 126,  194 => 125,  186 => 120,  182 => 118,  172 => 117,  159 => 111,  153 => 109,  151 => 108,  141 => 107,  131 => 104,  128 => 103,  124 => 102,  118 => 99,  114 => 97,  112 => 96,  107 => 94,  103 => 92,  97 => 89,  93 => 87,  90 => 86,  88 => 85,  85 => 84,  78 => 82,  75 => 81,  72 => 80,  62 => 79,  54 => 1,  52 => 77,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ApiPlatform/DataCollector/request_legacy.html.twig", "/var/www/html/vendor/api-platform/core/src/Symfony/Bundle/Resources/views/DataCollector/request_legacy.html.twig");
    }
}
