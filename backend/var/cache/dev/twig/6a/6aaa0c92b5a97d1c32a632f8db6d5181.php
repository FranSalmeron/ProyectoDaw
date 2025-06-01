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

/* @WebProfiler/Collector/logger.html.twig */
class __TwigTemplate_23a7ad5d80e614fa97d007184234db97 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/logger.html.twig"));

        // line 3
        $macros["helper"] = $this->macros["helper"] = $this;
        // line 1
        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_toolbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 6
        yield "    ";
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 6) || CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 6)) || CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 6))) {
            // line 7
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "            ";
                $context["status_color"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("red") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yellow") : ("none"))));
                // line 9
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/logger.svg");
                yield "
            <span class=\"sf-toolbar-value\">";
                // line 10
                yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 10)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 10), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 10) + CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 10)), "html", null, true)));
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 12
            yield "
        ";
            // line 13
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 14
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Errors</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 16
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("red") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", true, true, false, 16)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 16), 0)) : (0)), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Warnings</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 21
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yellow") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 21), 0)) : (0)), "html", null, true);
                yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Deprecations</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 26
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("none") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", true, true, false, 26)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 26), 0)) : (0)), "html", null, true);
                yield "</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 29
            yield "
        ";
            // line 30
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null), "status" => ($context["status_color"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 35
        yield "    <span class=\"label label-status-";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("error") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("warning") : ("none"))));
        yield " ";
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "logs", [], "any", false, false, false, 35))) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 36
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/logger.svg");
        yield "</span>
        <strong>Logs</strong>
        ";
        // line 38
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 38) || CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 38)) || CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 38))) {
            // line 39
            yield "            <span class=\"count\">
                <span>";
            // line 40
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 40)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 40), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 40) + CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countwarnings", [], "any", false, false, false, 40)), "html", null, true)));
            yield "</span>
            </span>
        ";
        }
        // line 43
        yield "    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 46
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 47
        yield "    <h2>Log Messages</h2>

    ";
        // line 49
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "processedLogs", [], "any", false, false, false, 49))) {
            // line 50
            yield "        <div class=\"empty\">
            <p>No log messages available.</p>
        </div>
    ";
        } else {
            // line 54
            yield "        ";
            $context["has_error_logs"] = (Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::column(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "processedLogs", [], "any", false, false, false, 54), "type"), function ($__type__) use ($context, $macros) { $context["type"] = $__type__; return ("error" == ($context["type"] ?? null)); })) > 0);
            // line 55
            yield "        ";
            $context["has_deprecation_logs"] = (Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::column(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "processedLogs", [], "any", false, false, false, 55), "type"), function ($__type__) use ($context, $macros) { $context["type"] = $__type__; return ("deprecation" == ($context["type"] ?? null)); })) > 0);
            // line 56
            yield "
        ";
            // line 57
            $context["filters"] = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "filters", [], "any", false, false, false, 57);
            // line 58
            yield "        <div class=\"log-filters\">
            <div id=\"log-filter-type\" class=\"log-filter\">
                <ul class=\"tab-navigation\">
                    <li class=\"";
            // line 61
            yield ((( !($context["has_error_logs"] ?? null) &&  !($context["has_deprecation_logs"] ?? null))) ? ("active") : (""));
            yield "\">
                        <input ";
            // line 62
            yield ((( !($context["has_error_logs"] ?? null) &&  !($context["has_deprecation_logs"] ?? null))) ? ("checked") : (""));
            yield " type=\"radio\" id=\"filter-log-type-all\" name=\"filter-log-type\" value=\"all\">
                        <label for=\"filter-log-type-all\">All messages</label>
                    </li>

                    <li class=\"";
            // line 66
            yield (((($tmp = ($context["has_error_logs"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\">
                        <input ";
            // line 67
            yield (((($tmp = ($context["has_error_logs"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("checked") : (""));
            yield " type=\"radio\" id=\"filter-log-type-error\" name=\"filter-log-type\" value=\"error\">
                        <label for=\"filter-log-type-error\">
                            Errors
                            <span class=\"badge status-";
            // line 70
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("error") : (""));
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "counterrors", [], "any", false, false, false, 70), 0)) : (0)), "html", null, true);
            yield "</span>
                        </label>
                    </li>

                    <li class=\"";
            // line 74
            yield ((( !($context["has_error_logs"] ?? null) && ($context["has_deprecation_logs"] ?? null))) ? ("active") : (""));
            yield "\">
                        <input ";
            // line 75
            yield ((( !($context["has_error_logs"] ?? null) && ($context["has_deprecation_logs"] ?? null))) ? ("checked") : (""));
            yield " type=\"radio\" id=\"filter-log-type-deprecation\" name=\"filter-log-type\" value=\"deprecation\">
                        <label for=\"filter-log-type-deprecation\">
                            Deprecations
                            <span class=\"badge status-";
            // line 78
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 78)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("warning") : (""));
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countdeprecations", [], "any", false, false, false, 78), 0)) : (0)), "html", null, true);
            yield "</span>
                        </label>
                    </li>
                </ul>
            </div>

            <details id=\"log-filter-priority\" class=\"log-filter\">
                <summary>
                    <span class=\"icon\">";
            // line 86
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/filter.svg");
            yield "</span>
                    Level (<span class=\"filter-active-num\">";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "priority", [], "any", false, false, false, 87)) - 1), "html", null, true);
            yield "</span>)
                </summary>

                <div class=\"log-filter-content\">
                    <div class=\"filter-select-all-or-none\">
                        <button type=\"button\" class=\"btn btn-link select-all\">Select All</button>
                        <button type=\"button\" class=\"btn btn-link select-none\">Select None</button>
                    </div>

                    ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "priority", [], "any", false, false, false, 96));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 97
                yield "                        <div class=\"log-filter-option\">
                            <input ";
                // line 98
                yield ((("debug" != $context["value"])) ? ("checked") : (""));
                yield " type=\"checkbox\" id=\"filter-log-level-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" name=\"filter-log-level-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\">
                            <label for=\"filter-log-level-";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</label>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            yield "                </div>
            </details>

            <details id=\"log-filter-channel\" class=\"log-filter\">
                <summary>
                    <span class=\"icon\">";
            // line 107
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/filter.svg");
            yield "</span>
                    Channel (<span class=\"filter-active-num\">";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "channel", [], "any", false, false, false, 108)) - 1), "html", null, true);
            yield "</span>)
                </summary>

                <div class=\"log-filter-content\">
                    <div class=\"filter-select-all-or-none\">
                        <button type=\"button\" class=\"btn btn-link select-all\">Select All</button>
                        <button type=\"button\" class=\"btn btn-link select-none\">Select None</button>
                    </div>

                    ";
            // line 117
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["filters"] ?? null), "channel", [], "any", false, false, false, 117));
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 118
                yield "                        <div class=\"log-filter-option\">
                            <input ";
                // line 119
                yield ((("event" != $context["value"])) ? ("checked") : (""));
                yield " type=\"checkbox\" id=\"filter-log-channel-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" name=\"filter-log-channel-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\">
                            <label for=\"filter-log-channel-";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["value"]), "html", null, true);
                yield "</label>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "                </div>
            </details>
        </div>

        <table class=\"logs\">
            <colgroup>
                <col width=\"140px\">
                <col>
            </colgroup>

            <thead>
                <th>Time</th>
                <th>Message</th>
            </thead>

            <tbody>
                ";
            // line 139
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "processedLogs", [], "any", false, false, false, 139));
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
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 140
                yield "                    ";
                $context["css_class"] = ((("error" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 140))) ? ("error") : (((((CoreExtension::getAttribute($this->env, $this->source,                 // line 141
$context["log"], "priorityName", [], "any", false, false, false, 141) == "WARNING") || ("deprecation" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 141)))) ? ("warning") : (((("silenced" == CoreExtension::getAttribute($this->env, $this->source,                 // line 142
$context["log"], "type", [], "any", false, false, false, 142))) ? ("silenced") : (""))))));
                // line 144
                yield "                    <tr class=\"log-status-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["css_class"] ?? null), "html", null, true);
                yield "\" data-type=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 144), "html", null, true);
                yield "\" data-priority=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priority", [], "any", false, false, false, 144), "html", null, true);
                yield "\" data-channel=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "channel", [], "any", false, false, false, 144), "html", null, true);
                yield "\" style=\"";
                yield (((("event" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "channel", [], "any", false, false, false, 144)) || ("DEBUG" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priorityName", [], "any", false, false, false, 144)))) ? ("display: none") : (""));
                yield "\">
                        <td class=\"log-timestamp\">
                            <time title=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 146), "r"), "html", null, true);
                yield "\" datetime=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 146), "c"), "html", null, true);
                yield "\">
                                ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 147), "H:i:s.v"), "html", null, true);
                yield "
                            </time>

                            ";
                // line 150
                if ((CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 150), ["error", "deprecation", "silenced"]) || ("WARNING" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priorityName", [], "any", false, false, false, 150)))) {
                    // line 151
                    yield "                                <span class=\"log-type-badge badge badge-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["css_class"] ?? null), "html", null, true);
                    yield "\">
                                    ";
                    // line 152
                    if ((("error" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 152)) || ("WARNING" == CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priorityName", [], "any", false, false, false, 152)))) {
                        // line 153
                        yield "                                        ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priorityName", [], "any", false, false, false, 153)), "html", null, true);
                        yield "
                                    ";
                    } else {
                        // line 155
                        yield "                                        ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 155)), "html", null, true);
                        yield "
                                    ";
                    }
                    // line 157
                    yield "                                </span>
                            ";
                } else {
                    // line 159
                    yield "                                <span class=\"log-type-badge badge badge-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["css_class"] ?? null), "html", null, true);
                    yield "\">
                                    ";
                    // line 160
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["log"], "priorityName", [], "any", false, false, false, 160)), "html", null, true);
                    yield "
                                </span>
                            ";
                }
                // line 163
                yield "                        </td>

                        <td class=\"font-normal\">
                            ";
                // line 166
                yield $macros["helper"]->getTemplateForMacro("macro_render_log_message", $context, 166, $this->getSourceContext())->macro_render_log_message(...["debug", CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 166), $context["log"]]);
                yield "
                        </td>
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
            unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            yield "            </tbody>
        </table>

        <div class=\"no-logs-message empty\">
            <p>There are no log messages.</p>
        </div>

        <script>Sfjs.initializeLogsTable();</script>
    ";
        }
        // line 179
        yield "
    ";
        // line 180
        $context["compilerLogTotal"] = 0;
        // line 181
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "compilerLogs", [], "any", false, false, false, 181));
        foreach ($context['_seq'] as $context["_key"] => $context["logs"]) {
            // line 182
            yield "        ";
            $context["compilerLogTotal"] = (($context["compilerLogTotal"] ?? null) + Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["logs"]));
            // line 183
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['logs'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 184
        yield "
    <details class=\"container-compilation-logs\">
        <summary>
            <h4>Container Compilation Logs <span class=\"text-muted\">(";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["compilerLogTotal"] ?? null), "html", null, true);
        yield ")</span></h4>
            <p class=\"text-muted\">Log messages generated during the compilation of the service container.</p>
        </summary>

        ";
        // line 191
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "compilerLogs", [], "any", false, false, false, 191))) {
            // line 192
            yield "            <div class=\"empty\">
                <p>There are no compiler log messages.</p>
            </div>
        ";
        } else {
            // line 196
            yield "            <table class=\"container-logs\">
                <thead>
                <tr>
                    <th>Messages</th>
                    <th class=\"full-width\">Class</th>
                </tr>
                </thead>

                <tbody>
                ";
            // line 205
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "compilerLogs", [], "any", false, false, false, 205));
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
            foreach ($context['_seq'] as $context["class"] => $context["logs"]) {
                // line 206
                yield "                    <tr>
                        <td class=\"font-normal text-right\">";
                // line 207
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["logs"]), "html", null, true);
                yield "</td>
                        <td class=\"font-normal\">
                            ";
                // line 209
                $context["context_id"] = ("context-compiler-" . CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 209));
                // line 210
                yield "
                            <button type=\"button\" class=\"btn btn-link sf-toggle\" data-toggle-selector=\"#";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["context_id"] ?? null), "html", null, true);
                yield "\" data-toggle-alt-content=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["class"], "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["class"], "html", null, true);
                yield "</button>

                            <div id=\"";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["context_id"] ?? null), "html", null, true);
                yield "\" class=\"context sf-toggle-content sf-toggle-hidden\">
                                <ul class=\"break-long-words\">
                                    ";
                // line 215
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["logs"]);
                foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                    // line 216
                    yield "                                        <li>";
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpLog($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 216));
                    yield "</li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['log'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 218
                yield "                                </ul>
                            </div>
                        </td>
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
            unset($context['_seq'], $context['class'], $context['logs'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            yield "                </tbody>
            </table>
        ";
        }
        // line 226
        yield "    </details>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 229
    public function macro_render_log_message($category = null, $log_index = null, $log = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "category" => $category,
            "log_index" => $log_index,
            "log" => $log,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_log_message"));

            // line 230
            yield "    ";
            $context["has_context"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", true, true, false, 230) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", false, false, false, 230)));
            // line 231
            yield "    ";
            $context["has_trace"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", false, true, false, 231), "exception", [], "any", false, true, false, 231), "trace", [], "any", true, true, false, 231);
            // line 232
            yield "
    ";
            // line 233
            if ((($tmp =  !($context["has_context"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 234
                yield "        ";
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpLog($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "message", [], "any", false, false, false, 234));
                yield "
    ";
            } else {
                // line 236
                yield "        ";
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpLog($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "message", [], "any", false, false, false, 236), CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", false, false, false, 236));
                yield "
    ";
            }
            // line 238
            yield "
    <div class=\"log-metadata\">
        ";
            // line 240
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "channel", [], "any", false, false, false, 240)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 241
                yield "            <span class=\"badge\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "channel", [], "any", false, false, false, 241), "html", null, true);
                yield "</span>
        ";
            }
            // line 243
            yield "
        ";
            // line 244
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "errorCount", [], "any", true, true, false, 244) && (CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "errorCount", [], "any", false, false, false, 244) > 1))) {
                // line 245
                yield "            <span class=\"log-num-occurrences\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "errorCount", [], "any", false, false, false, 245), "html", null, true);
                yield " times</span>
        ";
            }
            // line 247
            yield "
        ";
            // line 248
            if ((($tmp = ($context["has_context"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 249
                yield "            ";
                $context["context_id"] = ((("context-" . ($context["category"] ?? null)) . "-") . ($context["log_index"] ?? null));
                // line 250
                yield "            <span><button type=\"button\" class=\"btn btn-link text-small sf-toggle\" data-toggle-selector=\"#";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["context_id"] ?? null), "html", null, true);
                yield "\" data-toggle-alt-content=\"Hide context\">Show context</button></span>
        ";
            }
            // line 252
            yield "
        ";
            // line 253
            if ((($tmp = ($context["has_trace"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 254
                yield "            ";
                $context["trace_id"] = ((("trace-" . ($context["category"] ?? null)) . "-") . ($context["log_index"] ?? null));
                // line 255
                yield "            <span><button type=\"button\" class=\"btn btn-link text-small sf-toggle\" data-toggle-selector=\"#";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["trace_id"] ?? null), "html", null, true);
                yield "\" data-toggle-alt-content=\"Hide trace\">Show trace</button></span>
        ";
            }
            // line 257
            yield "
        ";
            // line 258
            if ((($tmp = ($context["has_context"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 259
                yield "            <div id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["context_id"] ?? null), "html", null, true);
                yield "\" class=\"context sf-toggle-content sf-toggle-hidden\">
                ";
                // line 260
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", false, false, false, 260), 1);
                yield "
            </div>
        ";
            }
            // line 263
            yield "
        ";
            // line 264
            if ((($tmp = ($context["has_trace"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 265
                yield "            <div id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["trace_id"] ?? null), "html", null, true);
                yield "\" class=\"context sf-toggle-content sf-toggle-hidden\">
                ";
                // line 266
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["log"] ?? null), "context", [], "any", false, false, false, 266), "exception", [], "any", false, false, false, 266), "trace", [], "any", false, false, false, 266), 1);
                yield "
            </div>
        ";
            }
            // line 269
            yield "    </div>
";
            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Collector/logger.html.twig";
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
        return array (  770 => 269,  764 => 266,  759 => 265,  757 => 264,  754 => 263,  748 => 260,  743 => 259,  741 => 258,  738 => 257,  732 => 255,  729 => 254,  727 => 253,  724 => 252,  718 => 250,  715 => 249,  713 => 248,  710 => 247,  704 => 245,  702 => 244,  699 => 243,  693 => 241,  691 => 240,  687 => 238,  681 => 236,  675 => 234,  673 => 233,  670 => 232,  667 => 231,  664 => 230,  647 => 229,  638 => 226,  633 => 223,  615 => 218,  606 => 216,  602 => 215,  597 => 213,  588 => 211,  585 => 210,  583 => 209,  578 => 207,  575 => 206,  558 => 205,  547 => 196,  541 => 192,  539 => 191,  532 => 187,  527 => 184,  521 => 183,  518 => 182,  513 => 181,  511 => 180,  508 => 179,  497 => 170,  479 => 166,  474 => 163,  468 => 160,  463 => 159,  459 => 157,  453 => 155,  447 => 153,  445 => 152,  440 => 151,  438 => 150,  432 => 147,  426 => 146,  412 => 144,  410 => 142,  409 => 141,  407 => 140,  390 => 139,  372 => 123,  361 => 120,  351 => 119,  348 => 118,  344 => 117,  332 => 108,  328 => 107,  321 => 102,  310 => 99,  300 => 98,  297 => 97,  293 => 96,  281 => 87,  277 => 86,  264 => 78,  258 => 75,  254 => 74,  245 => 70,  239 => 67,  235 => 66,  228 => 62,  224 => 61,  219 => 58,  217 => 57,  214 => 56,  211 => 55,  208 => 54,  202 => 50,  200 => 49,  196 => 47,  186 => 46,  177 => 43,  171 => 40,  168 => 39,  166 => 38,  161 => 36,  154 => 35,  144 => 34,  133 => 30,  130 => 29,  121 => 26,  111 => 21,  101 => 16,  97 => 14,  95 => 13,  92 => 12,  86 => 10,  81 => 9,  78 => 8,  75 => 7,  72 => 6,  62 => 5,  54 => 1,  52 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/logger.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/logger.html.twig");
    }
}
