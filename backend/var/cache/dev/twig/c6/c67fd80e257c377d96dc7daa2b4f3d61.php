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

/* @Doctrine/Collector/db.html.twig */
class __TwigTemplate_5e5fe660fd33c716aa0743a0314a6fd5 extends Template
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
            'queries' => [$this, 'block_queries'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return $this->load((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["request"] ?? null), "isXmlHttpRequest", [], "any", false, false, false, 1)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("@WebProfiler/Profiler/ajax_layout.html.twig") : ("@WebProfiler/Profiler/layout.html.twig")), 1);
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Doctrine/Collector/db.html.twig"));

        // line 3
        $macros["helper"] = $this->macros["helper"] = $this;
        // line 1
        yield from $this->getParent($context)->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
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
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 6) > 0) || (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 6) > 0))) {
            // line 7
            yield "
        ";
            // line 8
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 9
                yield "            ";
                $context["status"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 9) > 0)) ? ("red") : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 9) > 50)) ? ("yellow") : (""))));
                // line 10
                yield "
            ";
                // line 11
                if ((($context["profiler_markup_version"] ?? null) >= 3)) {
                    // line 12
                    yield "                ";
                    yield Twig\Extension\CoreExtension::include($this->env, $context, "@Doctrine/Collector/database.svg");
                    yield "
            ";
                } else {
                    // line 14
                    yield "                <span class=\"icon\">";
                    yield Twig\Extension\CoreExtension::include($this->env, $context, "@Doctrine/Collector/icon.svg");
                    yield "</span>
            ";
                }
                // line 16
                yield "
            ";
                // line 17
                if (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 17) == 0) && (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 17) > 0))) {
                    // line 18
                    yield "                <span class=\"sf-toolbar-value\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 18), "html", null, true);
                    yield "</span>
                <span class=\"sf-toolbar-label\">errors</span>
            ";
                } else {
                    // line 21
                    yield "                <span class=\"sf-toolbar-value\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 21), "html", null, true);
                    yield "</span>
                <span class=\"sf-toolbar-info-piece-additional-detail\">
                    <span class=\"sf-toolbar-label\">in</span>
                    <span class=\"sf-toolbar-value\">";
                    // line 24
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 24) * 1000)), "html", null, true);
                    yield "</span>
                    <span class=\"sf-toolbar-label\">ms</span>
                </span>
            ";
                }
                // line 28
                yield "        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 29
            yield "
        ";
            // line 30
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 31
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Database Queries</b>
                <span class=\"sf-toolbar-status ";
                // line 33
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 33) > 50)) ? ("sf-toolbar-status-yellow") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 33), "html", null, true);
                yield "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Different statements</b>
                <span class=\"sf-toolbar-status\">";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "groupedQueryCount", [], "any", false, false, false, 37), "html", null, true);
                yield "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Query time</b>
                <span>";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 41) * 1000)), "html", null, true);
                yield " ms</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Invalid entities</b>
                <span class=\"sf-toolbar-status ";
                // line 45
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 45) > 0)) ? ("sf-toolbar-status-red") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 45), "html", null, true);
                yield "</span>
            </div>
            ";
                // line 47
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheEnabled", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 48
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Cache hits</b>
                    <span class=\"sf-toolbar-status sf-toolbar-status-green\">";
                    // line 50
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheHitsCount", [], "any", false, false, false, 50), "html", null, true);
                    yield "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Cache misses</b>
                    <span class=\"sf-toolbar-status ";
                    // line 54
                    yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheMissesCount", [], "any", false, false, false, 54) > 0)) ? ("sf-toolbar-status-yellow") : (""));
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheMissesCount", [], "any", false, false, false, 54), "html", null, true);
                    yield "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Cache puts</b>
                    <span class=\"sf-toolbar-status ";
                    // line 58
                    yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cachePutsCount", [], "any", false, false, false, 58) > 0)) ? ("sf-toolbar-status-yellow") : (""));
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cachePutsCount", [], "any", false, false, false, 58), "html", null, true);
                    yield "</span>
                </div>
            ";
                } else {
                    // line 61
                    yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Second Level Cache</b>
                    <span class=\"sf-toolbar-status\">disabled</span>
                </div>
            ";
                }
                // line 66
                yield "        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 67
            yield "
        ";
            // line 68
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null), "status" => ((array_key_exists("status", $context)) ? (Twig\Extension\CoreExtension::default(($context["status"] ?? null), "")) : (""))]);
            yield "

    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 73
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 74
        yield "    <span class=\"label ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 74) > 0)) ? ("label-status-error") : (""));
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 74) == 0)) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 75
        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@Doctrine/Collector/" . (((($context["profiler_markup_version"] ?? null) < 3)) ? ("icon") : ("database"))) . ".svg"));
        yield "</span>
        <strong>Doctrine</strong>
        ";
        // line 77
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 77)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 78
            yield "            <span class=\"count\">
                <span>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 79), "html", null, true);
            yield "</span>
            </span>
        ";
        }
        // line 82
        yield "    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 85
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 86
        yield "    ";
        if (("explain" == ($context["page"] ?? null))) {
            // line 87
            yield "        ";
            yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("Doctrine\\Bundle\\DoctrineBundle\\Controller\\ProfilerController::explainAction", ["token" =>             // line 88
($context["token"] ?? null), "panel" => "db", "connectionName" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 90
($context["request"] ?? null), "query", [], "any", false, false, false, 90), "get", ["connection"], "method", false, false, false, 90), "query" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 91
($context["request"] ?? null), "query", [], "any", false, false, false, 91), "get", ["query"], "method", false, false, false, 91)]));
            // line 92
            yield "
    ";
        } else {
            // line 94
            yield "        ";
            yield from             $this->unwrap()->yieldBlock("queries", $context, $blocks);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 98
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_queries(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "queries"));

        // line 99
        yield "    <style>
        .time-container { position: relative; }
        .time-container .nowrap { position: relative; z-index: 1; text-shadow: 0 0 2px #fff; }
        .time-bar { display: block; position: absolute; top: 0; left: 0; bottom: 0; background: #e0e0e0; }
        .sql-runnable.sf-toggle-content.sf-toggle-visible { display: flex; flex-direction: column; }
        .sql-runnable button { align-self: end; }
        ";
        // line 105
        if ((($context["profiler_markup_version"] ?? null) >= 3)) {
            // line 106
            yield "        .highlight .keyword   { color: var(--highlight-keyword); font-weight: bold; }
        .highlight .word      { color: var(--color-text); }
        .highlight .variable  { color: var(--highlight-variable); }
        .highlight .symbol    { color: var(--color-text); }
        .highlight .comment   { color: var(--highlight-comment); }
        .highlight .string    { color: var(--highlight-string); }
        .highlight .number    { color: var(--highlight-constant); font-weight: bold; }
        .highlight .error     { color: var(--highlight-error); }
        ";
        }
        // line 115
        yield "    </style>

    <h2>Query Metrics</h2>

    <div class=\"metrics\">
        <div class=\"metric-group\">
            <div class=\"metric\">
                <span class=\"value\">";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "querycount", [], "any", false, false, false, 122), "html", null, true);
        yield "</span>
                <span class=\"label\">Database Queries</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "groupedQueryCount", [], "any", false, false, false, 127), "html", null, true);
        yield "</span>
                <span class=\"label\">Different statements</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "time", [], "any", false, false, false, 132) * 1000)), "html", null, true);
        yield " ms</span>
                <span class=\"label\">Query time</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "invalidEntityCount", [], "any", false, false, false, 137), "html", null, true);
        yield "</span>
                <span class=\"label\">Invalid entities</span>
            </div>
        </div>

        ";
        // line 142
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheEnabled", [], "any", false, false, false, 142)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 143
            yield "            <div class=\"metric-group\">
                <div class=\"metric\">
                    <span class=\"value\">";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheHitsCount", [], "any", false, false, false, 145), "html", null, true);
            yield "</span>
                    <span class=\"label\">Cache hits</span>
                </div>
                <div class=\"metric\">
                    <span class=\"value\">";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheMissesCount", [], "any", false, false, false, 149), "html", null, true);
            yield "</span>
                    <span class=\"label\">Cache misses</span>
                </div>
                <div class=\"metric\">
                    <span class=\"value\">";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cachePutsCount", [], "any", false, false, false, 153), "html", null, true);
            yield "</span>
                    <span class=\"label\">Cache puts</span>
                </div>
            </div>
        ";
        }
        // line 158
        yield "    </div>

    <div class=\"sf-tabs\" style=\"margin-top: 20px;\">
        <div class=\"tab ";
        // line 161
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "queries", [], "any", false, false, false, 161))) ? ("disabled") : (""));
        yield "\">
            ";
        // line 162
        $context["group_queries"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["request"] ?? null), "query", [], "any", false, false, false, 162), "getBoolean", ["group"], "method", false, false, false, 162);
        // line 163
        yield "            <h3 class=\"tab-title\">
                ";
        // line 164
        if ((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 165
            yield "                    Grouped Statements
                ";
        } else {
            // line 167
            yield "                    Queries
                ";
        }
        // line 169
        yield "            </h3>

            <div class=\"tab-content\">
                ";
        // line 172
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "queries", [], "any", false, false, false, 172)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 173
            yield "                    <div class=\"empty\">
                        <p>No executed queries.</p>
                    </div>
                ";
        } else {
            // line 177
            yield "                    ";
            if ((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 178
                yield "                        <p><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["panel" => "db", "token" => ($context["token"] ?? null)]), "html", null, true);
                yield "\">Show all queries</a></p>
                    ";
            } else {
                // line 180
                yield "                        <p><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["panel" => "db", "token" => ($context["token"] ?? null), "group" => true]), "html", null, true);
                yield "\">Group similar statements</a></p>
                    ";
            }
            // line 182
            yield "
                    ";
            // line 183
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "queries", [], "any", false, false, false, 183));
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
            foreach ($context['_seq'] as $context["connection"] => $context["queries"]) {
                // line 184
                yield "                        ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "connections", [], "any", false, false, false, 184)) > 1)) {
                    // line 185
                    yield "                            <h3>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["connection"], "html", null, true);
                    yield " <small>connection</small></h3>
                        ";
                }
                // line 187
                yield "
                        ";
                // line 188
                if (Twig\Extension\CoreExtension::testEmpty($context["queries"])) {
                    // line 189
                    yield "                            <div class=\"empty\">
                                <p>No database queries were performed.</p>
                            </div>
                        ";
                } else {
                    // line 193
                    yield "                            ";
                    if ((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 194
                        yield "                                ";
                        $context["queries"] = (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "groupedQueries", [], "any", false, false, false, 194)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[$context["connection"]] ?? null) : null);
                        // line 195
                        yield "                            ";
                    }
                    // line 196
                    yield "                            <table class=\"alt queries-table\">
                                <thead>
                                <tr>
                                    ";
                    // line 199
                    if ((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 200
                        yield "                                        <th class=\"nowrap\" onclick=\"javascript:sortTable(this, 0, 'queries-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 200), "html", null, true);
                        yield "')\" data-sort-direction=\"1\" style=\"cursor: pointer;\">Time<span class=\"text-muted\">&#9660;</span></th>
                                        <th class=\"nowrap\" onclick=\"javascript:sortTable(this, 1, 'queries-";
                        // line 201
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 201), "html", null, true);
                        yield "')\" style=\"cursor: pointer;\">Count<span></span></th>
                                    ";
                    } else {
                        // line 203
                        yield "                                        <th class=\"nowrap\" onclick=\"javascript:sortTable(this, 0, 'queries-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 203), "html", null, true);
                        yield "')\" data-sort-direction=\"-1\" style=\"cursor: pointer;\">#<span class=\"text-muted\">&#9650;</span></th>
                                        <th class=\"nowrap\" onclick=\"javascript:sortTable(this, 1, 'queries-";
                        // line 204
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 204), "html", null, true);
                        yield "')\" style=\"cursor: pointer;\">Time<span></span></th>
                                    ";
                    }
                    // line 206
                    yield "                                    <th style=\"width: 100%;\">Info</th>
                                </tr>
                                </thead>
                                <tbody id=\"queries-";
                    // line 209
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 209), "html", null, true);
                    yield "\">
                                ";
                    // line 210
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable($context["queries"]);
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
                    foreach ($context['_seq'] as $context["i"] => $context["query"]) {
                        // line 211
                        yield "                                    ";
                        $context["i"] = (((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["query"], "index", [], "any", false, false, false, 211)) : ($context["i"]));
                        // line 212
                        yield "                                    <tr id=\"queryNo-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 212), "loop", [], "any", false, false, false, 212), "index", [], "any", false, false, false, 212), "html", null, true);
                        yield "\">
                                        ";
                        // line 213
                        if ((($tmp = ($context["group_queries"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 214
                            yield "                                            <td class=\"time-container\">
                                                <span class=\"time-bar\" style=\"width:";
                            // line 215
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, $context["query"], "executionPercent", [], "any", false, false, false, 215)), "html", null, true);
                            yield "%\"></span>
                                                <span class=\"nowrap\">";
                            // line 216
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, $context["query"], "executionMS", [], "any", false, false, false, 216) * 1000)), "html", null, true);
                            yield "&nbsp;ms<br />(";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", CoreExtension::getAttribute($this->env, $this->source, $context["query"], "executionPercent", [], "any", false, false, false, 216)), "html", null, true);
                            yield "%)</span>
                                            </td>
                                            <td class=\"nowrap\">";
                            // line 218
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["query"], "count", [], "any", false, false, false, 218), "html", null, true);
                            yield "</td>
                                        ";
                        } else {
                            // line 220
                            yield "                                            <td class=\"nowrap\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 220), "html", null, true);
                            yield "</td>
                                            <td class=\"nowrap\">";
                            // line 221
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, $context["query"], "executionMS", [], "any", false, false, false, 221) * 1000)), "html", null, true);
                            yield "&nbsp;ms</td>
                                        ";
                        }
                        // line 223
                        yield "                                        <td>
                                            ";
                        // line 224
                        yield $this->extensions['Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension']->prettifySql(CoreExtension::getAttribute($this->env, $this->source, $context["query"], "sql", [], "any", false, false, false, 224));
                        yield "

                                            <div>
                                                <strong class=\"font-normal text-small\">Parameters</strong>: ";
                        // line 227
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["query"], "params", [], "any", false, false, false, 227), 2);
                        yield "
                                            </div>

                                            <div class=\"text-small font-normal\">
                                                <a href=\"#\" class=\"sf-toggle link-inverse\" data-toggle-selector=\"#formatted-query-";
                        // line 231
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 231), "loop", [], "any", false, false, false, 231), "index", [], "any", false, false, false, 231), "html", null, true);
                        yield "\" data-toggle-alt-content=\"Hide formatted query\">View formatted query</a>

                                                ";
                        // line 233
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["query"], "runnable", [], "any", false, false, false, 233)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 234
                            yield "                                                    &nbsp;&nbsp;
                                                    <a href=\"#\" class=\"sf-toggle link-inverse\" data-toggle-selector=\"#original-query-";
                            // line 235
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 235), "loop", [], "any", false, false, false, 235), "index", [], "any", false, false, false, 235), "html", null, true);
                            yield "\" data-toggle-alt-content=\"Hide runnable query\">View runnable query</a>
                                                ";
                        }
                        // line 237
                        yield "
                                                ";
                        // line 238
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["query"], "explainable", [], "any", false, false, false, 238)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 239
                            yield "                                                    &nbsp;&nbsp;
                                                    <a class=\"link-inverse\" href=\"";
                            // line 240
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["panel" => "db", "token" => ($context["token"] ?? null), "page" => "explain", "connection" => $context["connection"], "query" => $context["i"]]), "html", null, true);
                            yield "\" onclick=\"return explain(this);\" data-target-id=\"explain-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 240), "loop", [], "any", false, false, false, 240), "index", [], "any", false, false, false, 240), "html", null, true);
                            yield "\">Explain query</a>
                                                ";
                        }
                        // line 242
                        yield "
                                                ";
                        // line 243
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["query"], "backtrace", [], "any", true, true, false, 243)) {
                            // line 244
                            yield "                                                    &nbsp;&nbsp;
                                                    <a href=\"#\" class=\"sf-toggle link-inverse\" data-toggle-selector=\"#backtrace-";
                            // line 245
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 245), "loop", [], "any", false, false, false, 245), "index", [], "any", false, false, false, 245), "html", null, true);
                            yield "\" data-toggle-alt-content=\"Hide query backtrace\">View query backtrace</a>
                                                ";
                        }
                        // line 247
                        yield "                                            </div>

                                            <div id=\"formatted-query-";
                        // line 249
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 249), "loop", [], "any", false, false, false, 249), "index", [], "any", false, false, false, 249), "html", null, true);
                        yield "\" class=\"sql-runnable hidden\">
                                                ";
                        // line 250
                        yield $this->extensions['Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension']->formatSql(CoreExtension::getAttribute($this->env, $this->source, $context["query"], "sql", [], "any", false, false, false, 250), true);
                        yield "
                                                <button class=\"btn btn-sm hidden\" data-clipboard-text=\"";
                        // line 251
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension']->formatSql(CoreExtension::getAttribute($this->env, $this->source, $context["query"], "sql", [], "any", false, false, false, 251), false), "html_attr");
                        yield "\">Copy</button>
                                            </div>

                                            ";
                        // line 254
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["query"], "runnable", [], "any", false, false, false, 254)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 255
                            yield "                                                <div id=\"original-query-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 255), "loop", [], "any", false, false, false, 255), "index", [], "any", false, false, false, 255), "html", null, true);
                            yield "\" class=\"sql-runnable hidden\">
                                                    ";
                            // line 256
                            $context["runnable_sql"] = $this->extensions['Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension']->replaceQueryParameters((CoreExtension::getAttribute($this->env, $this->source, $context["query"], "sql", [], "any", false, false, false, 256) . ";"), CoreExtension::getAttribute($this->env, $this->source, $context["query"], "params", [], "any", false, false, false, 256));
                            // line 257
                            yield "                                                    ";
                            yield $this->extensions['Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension']->prettifySql(($context["runnable_sql"] ?? null));
                            yield "
                                                    <button class=\"btn btn-sm hidden\" data-clipboard-text=\"";
                            // line 258
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["runnable_sql"] ?? null), "html_attr");
                            yield "\">Copy</button>
                                                </div>
                                            ";
                        }
                        // line 261
                        yield "
                                            ";
                        // line 262
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["query"], "explainable", [], "any", false, false, false, 262)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 263
                            yield "                                                <div id=\"explain-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 263), "loop", [], "any", false, false, false, 263), "index", [], "any", false, false, false, 263), "html", null, true);
                            yield "\" class=\"sql-explain\"></div>
                                            ";
                        }
                        // line 265
                        yield "
                                            ";
                        // line 266
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["query"], "backtrace", [], "any", true, true, false, 266)) {
                            // line 267
                            yield "                                                <div id=\"backtrace-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                            yield "-";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "parent", [], "any", false, false, false, 267), "loop", [], "any", false, false, false, 267), "index", [], "any", false, false, false, 267), "html", null, true);
                            yield "\" class=\"hidden\">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th scope=\"col\">#</th>
                                                            <th scope=\"col\">File/Call</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        ";
                            // line 276
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["query"], "backtrace", [], "any", false, false, false, 276));
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
                            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                                // line 277
                                yield "                                                            <tr>
                                                                <td>";
                                // line 278
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 278), "html", null, true);
                                yield "</td>
                                                                <td>
                                                                            <span class=\"text-small\">
                                                                                ";
                                // line 281
                                $context["line_number"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "line", [], "any", true, true, false, 281)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "line", [], "any", false, false, false, 281), 1)) : (1));
                                // line 282
                                yield "                                                                                ";
                                if (CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "file", [], "any", true, true, false, 282)) {
                                    // line 283
                                    yield "                                                                                    <a href=\"";
                                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "file", [], "any", false, false, false, 283), ($context["line_number"] ?? null)), "html", null, true);
                                    yield "\">
                                                                                ";
                                }
                                // line 285
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "class", [], "any", true, true, false, 285)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "class", [], "any", false, false, false, 285))) : ("")) . ((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "class", [], "any", true, true, false, 285)) ? (((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "type", [], "any", true, true, false, 285)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "type", [], "any", false, false, false, 285), "::")) : ("::"))) : (""))), "html", null, true);
                                // line 286
                                yield "<span class=\"status-warning\">";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "function", [], "any", false, false, false, 286), "html", null, true);
                                yield "</span>
                                                                                ";
                                // line 287
                                if (CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "file", [], "any", true, true, false, 287)) {
                                    // line 288
                                    yield "                                                                                    </a>
                                                                                ";
                                }
                                // line 290
                                yield "                                                                                (line ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["line_number"] ?? null), "html", null, true);
                                yield ")
                                                                            </span>
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
                            unset($context['_seq'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 295
                            yield "                                                        </tbody>
                                                    </table>
                                                </div>
                                            ";
                        }
                        // line 299
                        yield "                                        </td>
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
                    unset($context['_seq'], $context['i'], $context['query'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 302
                    yield "                                </tbody>
                            </table>
                        ";
                }
                // line 305
                yield "                    ";
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
            unset($context['_seq'], $context['connection'], $context['queries'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 306
            yield "                ";
        }
        // line 307
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 310
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "connections", [], "any", false, false, false, 310))) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Database Connections</h3>
            <div class=\"tab-content\">
                ";
        // line 313
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "connections", [], "any", false, false, false, 313)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 314
            yield "                    <div class=\"empty\">
                        <p>There are no configured database connections.</p>
                    </div>
                ";
        } else {
            // line 318
            yield "                    ";
            yield $macros["helper"]->getTemplateForMacro("macro_render_simple_table", $context, 318, $this->getSourceContext())->macro_render_simple_table(...["Name", "Service", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "connections", [], "any", false, false, false, 318)]);
            yield "
                ";
        }
        // line 320
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 323
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "managers", [], "any", false, false, false, 323))) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Entity Managers</h3>
            <div class=\"tab-content\">

                ";
        // line 327
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "managers", [], "any", false, false, false, 327)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 328
            yield "                    <div class=\"empty\">
                        <p>There are no configured entity managers.</p>
                    </div>
                ";
        } else {
            // line 332
            yield "                    ";
            yield $macros["helper"]->getTemplateForMacro("macro_render_simple_table", $context, 332, $this->getSourceContext())->macro_render_simple_table(...["Name", "Service", CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "managers", [], "any", false, false, false, 332)]);
            yield "
                ";
        }
        // line 334
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 337
        yield (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheEnabled", [], "any", false, false, false, 337)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Second Level Cache</h3>
            <div class=\"tab-content\">

                ";
        // line 341
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheEnabled", [], "any", false, false, false, 341)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 342
            yield "                    <div class=\"empty\">
                        <p>Second Level Cache is not enabled.</p>
                    </div>
                ";
        } else {
            // line 346
            yield "                    ";
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheCounts", [], "any", false, false, false, 346)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 347
                yield "                        <div class=\"empty\">
                            <p>Second level cache information is not available.</p>
                        </div>
                    ";
            } else {
                // line 351
                yield "                        <div class=\"metrics\">
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 353
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheCounts", [], "any", false, false, false, 353), "hits", [], "any", false, false, false, 353), "html", null, true);
                yield "</span>
                                <span class=\"label\">Hits</span>
                            </div>

                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 358
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheCounts", [], "any", false, false, false, 358), "misses", [], "any", false, false, false, 358), "html", null, true);
                yield "</span>
                                <span class=\"label\">Misses</span>
                            </div>

                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 363
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheCounts", [], "any", false, false, false, 363), "puts", [], "any", false, false, false, 363), "html", null, true);
                yield "</span>
                                <span class=\"label\">Puts</span>
                            </div>
                        </div>

                        ";
                // line 368
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 368), "hits", [], "any", false, false, false, 368)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 369
                    yield "                            <h3>Number of cache hits</h3>
                            ";
                    // line 370
                    yield $macros["helper"]->getTemplateForMacro("macro_render_simple_table", $context, 370, $this->getSourceContext())->macro_render_simple_table(...["Region", "Hits", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 370), "hits", [], "any", false, false, false, 370)]);
                    yield "
                        ";
                }
                // line 372
                yield "
                        ";
                // line 373
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 373), "misses", [], "any", false, false, false, 373)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 374
                    yield "                            <h3>Number of cache misses</h3>
                            ";
                    // line 375
                    yield $macros["helper"]->getTemplateForMacro("macro_render_simple_table", $context, 375, $this->getSourceContext())->macro_render_simple_table(...["Region", "Misses", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 375), "misses", [], "any", false, false, false, 375)]);
                    yield "
                        ";
                }
                // line 377
                yield "
                        ";
                // line 378
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 378), "puts", [], "any", false, false, false, 378)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 379
                    yield "                            <h3>Number of cache puts</h3>
                            ";
                    // line 380
                    yield $macros["helper"]->getTemplateForMacro("macro_render_simple_table", $context, 380, $this->getSourceContext())->macro_render_simple_table(...["Region", "Puts", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "cacheRegions", [], "any", false, false, false, 380), "puts", [], "any", false, false, false, 380)]);
                    yield "
                        ";
                }
                // line 382
                yield "                    ";
            }
            // line 383
            yield "                ";
        }
        // line 384
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 387
        yield (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "entities", [], "any", false, false, false, 387)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Entities Mapping</h3>
            <div class=\"tab-content\">

                ";
        // line 391
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "entities", [], "any", false, false, false, 391)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 392
            yield "                    <div class=\"empty\">
                        <p>No mapped entities.</p>
                    </div>
                ";
        } else {
            // line 396
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "entities", [], "any", false, false, false, 396));
            foreach ($context['_seq'] as $context["manager"] => $context["classes"]) {
                // line 397
                yield "                        ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "managers", [], "any", false, false, false, 397)) > 1)) {
                    // line 398
                    yield "                            <h3>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["manager"], "html", null, true);
                    yield " <small>entity manager</small></h3>
                        ";
                }
                // line 400
                yield "
                        ";
                // line 401
                if (Twig\Extension\CoreExtension::testEmpty($context["classes"])) {
                    // line 402
                    yield "                            <div class=\"empty\">
                                <p>No loaded entities.</p>
                            </div>
                        ";
                } else {
                    // line 406
                    yield "                            <table>
                                <thead>
                                <tr>
                                    <th scope=\"col\">Class</th>
                                    <th scope=\"col\">Mapping errors</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
                    // line 414
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable($context["classes"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                        // line 415
                        yield "                                    ";
                        $context["contains_errors"] = (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "mappingErrors", [], "any", false, true, false, 415), $context["manager"], [], "array", true, true, false, 415) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "mappingErrors", [], "any", false, true, false, 415), $context["manager"], [], "array", false, true, false, 415), CoreExtension::getAttribute($this->env, $this->source, $context["class"], "class", [], "any", false, false, false, 415), [], "array", true, true, false, 415));
                        // line 416
                        yield "                                    <tr class=\"";
                        yield (((($tmp = ($context["contains_errors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("status-error") : (""));
                        yield "\">
                                        <td>
                                <a href=\"";
                        // line 418
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, $context["class"], "file", [], "any", false, false, false, 418), CoreExtension::getAttribute($this->env, $this->source, $context["class"], "line", [], "any", false, false, false, 418)), "html", null, true);
                        yield "\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["class"], "class", [], "any", false, false, false, 418), "html", null, true);
                        yield "</a>
                            </td>
                                        <td class=\"font-normal\">
                                            ";
                        // line 421
                        if ((($tmp = ($context["contains_errors"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 422
                            yield "                                                <ul>
                                                    ";
                            // line 423
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable((($_v1 = (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "mappingErrors", [], "any", false, false, false, 423)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["manager"]] ?? null) : null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, $context["class"], "class", [], "any", false, false, false, 423)] ?? null) : null));
                            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                                // line 424
                                yield "                                                        <li>";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                                yield "</li>
                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 426
                            yield "                                                </ul>
                                            ";
                        } else {
                            // line 428
                            yield "                                                No errors.
                                            ";
                        }
                        // line 430
                        yield "                                        </td>
                                    </tr>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['class'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 433
                    yield "                                </tbody>
                            </table>
                        ";
                }
                // line 436
                yield "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['manager'], $context['classes'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 437
            yield "                ";
        }
        // line 438
        yield "            </div>
        </div>
    </div>

    <script type=\"text/javascript\">//<![CDATA[
        function explain(link) {
            \"use strict\";

            var targetId = link.getAttribute('data-target-id');
            var targetElement = document.getElementById(targetId);

            if (targetElement.style.display != 'block') {
                if (targetElement.getAttribute('data-sfurl') !== link.href) {
                    fetch(link.href, {
                        headers: {'X-Requested-With': 'XMLHttpRequest'}
                    }).then(async function (response) {
                        targetElement.innerHTML = await response.text()
                        targetElement.setAttribute('data-sfurl', link.href)
                    }, function () {
                        targetElement.innerHTML = 'An error occurred while loading the query explanation.';
                    })
                }

                targetElement.style.display = 'block';
                link.innerHTML = 'Hide query explanation';
            } else {
                targetElement.style.display = 'none';
                link.innerHTML = 'Explain query';
            }

            return false;
        }

        function sortTable(header, column, targetId) {
            \"use strict\";

            var direction = parseInt(header.getAttribute('data-sort-direction')) || 1,
                items = [],
                target = document.getElementById(targetId),
                rows = target.children,
                headers = header.parentElement.children,
                i;

            for (i = 0; i < rows.length; ++i) {
                items.push(rows[i]);
            }

            for (i = 0; i < headers.length; ++i) {
                headers[i].removeAttribute('data-sort-direction');
                if (headers[i].children.length > 0) {
                    headers[i].children[0].innerHTML = '';
                }
            }

            header.setAttribute('data-sort-direction', (-1*direction).toString());
            header.children[0].innerHTML = direction > 0 ? '<span class=\"text-muted\">&#9650;</span>' : '<span class=\"text-muted\">&#9660;</span>';

            items.sort(function(a, b) {
                return direction * (parseFloat(a.children[column].innerHTML) - parseFloat(b.children[column].innerHTML));
            });

            for (i = 0; i < items.length; ++i) {
                target.appendChild(items[i]);
            }
        }

        if (navigator.clipboard) {
            document.querySelectorAll('[data-clipboard-text]').forEach(function(button) {
                button.classList.remove('hidden');
                button.addEventListener('click', function() {
                    navigator.clipboard.writeText(button.getAttribute('data-clipboard-text'));
                })
            });
        }

        //]]></script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 516
    public function macro_render_simple_table($label1 = null, $label2 = null, $data = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "label1" => $label1,
            "label2" => $label2,
            "data" => $data,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_simple_table"));

            // line 517
            yield "    <table>
        <thead>
        <tr>
            <th scope=\"col\" class=\"key\">";
            // line 520
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label1"] ?? null), "html", null, true);
            yield "</th>
            <th scope=\"col\">";
            // line 521
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["label2"] ?? null), "html", null, true);
            yield "</th>
        </tr>
        </thead>
        <tbody>
        ";
            // line 525
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 526
                yield "            <tr>
                <th scope=\"row\">";
                // line 527
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["key"], "html", null, true);
                yield "</th>
                <td>";
                // line 528
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 531
            yield "        </tbody>
    </table>
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
        return "@Doctrine/Collector/db.html.twig";
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
        return array (  1264 => 531,  1255 => 528,  1251 => 527,  1248 => 526,  1244 => 525,  1237 => 521,  1233 => 520,  1228 => 517,  1211 => 516,  1127 => 438,  1124 => 437,  1118 => 436,  1113 => 433,  1105 => 430,  1101 => 428,  1097 => 426,  1088 => 424,  1084 => 423,  1081 => 422,  1079 => 421,  1071 => 418,  1065 => 416,  1062 => 415,  1058 => 414,  1048 => 406,  1042 => 402,  1040 => 401,  1037 => 400,  1031 => 398,  1028 => 397,  1023 => 396,  1017 => 392,  1015 => 391,  1008 => 387,  1003 => 384,  1000 => 383,  997 => 382,  992 => 380,  989 => 379,  987 => 378,  984 => 377,  979 => 375,  976 => 374,  974 => 373,  971 => 372,  966 => 370,  963 => 369,  961 => 368,  953 => 363,  945 => 358,  937 => 353,  933 => 351,  927 => 347,  924 => 346,  918 => 342,  916 => 341,  909 => 337,  904 => 334,  898 => 332,  892 => 328,  890 => 327,  883 => 323,  878 => 320,  872 => 318,  866 => 314,  864 => 313,  858 => 310,  853 => 307,  850 => 306,  836 => 305,  831 => 302,  815 => 299,  809 => 295,  789 => 290,  785 => 288,  783 => 287,  778 => 286,  776 => 285,  770 => 283,  767 => 282,  765 => 281,  759 => 278,  756 => 277,  739 => 276,  724 => 267,  722 => 266,  719 => 265,  711 => 263,  709 => 262,  706 => 261,  700 => 258,  695 => 257,  693 => 256,  686 => 255,  684 => 254,  678 => 251,  674 => 250,  668 => 249,  664 => 247,  657 => 245,  654 => 244,  652 => 243,  649 => 242,  640 => 240,  637 => 239,  635 => 238,  632 => 237,  625 => 235,  622 => 234,  620 => 233,  613 => 231,  606 => 227,  600 => 224,  597 => 223,  592 => 221,  587 => 220,  582 => 218,  575 => 216,  571 => 215,  568 => 214,  566 => 213,  559 => 212,  556 => 211,  539 => 210,  535 => 209,  530 => 206,  525 => 204,  520 => 203,  515 => 201,  510 => 200,  508 => 199,  503 => 196,  500 => 195,  497 => 194,  494 => 193,  488 => 189,  486 => 188,  483 => 187,  477 => 185,  474 => 184,  457 => 183,  454 => 182,  448 => 180,  442 => 178,  439 => 177,  433 => 173,  431 => 172,  426 => 169,  422 => 167,  418 => 165,  416 => 164,  413 => 163,  411 => 162,  407 => 161,  402 => 158,  394 => 153,  387 => 149,  380 => 145,  376 => 143,  374 => 142,  366 => 137,  358 => 132,  350 => 127,  342 => 122,  333 => 115,  322 => 106,  320 => 105,  312 => 99,  302 => 98,  290 => 94,  286 => 92,  284 => 91,  283 => 90,  282 => 88,  280 => 87,  277 => 86,  267 => 85,  258 => 82,  252 => 79,  249 => 78,  247 => 77,  242 => 75,  235 => 74,  225 => 73,  213 => 68,  210 => 67,  206 => 66,  199 => 61,  191 => 58,  182 => 54,  175 => 50,  171 => 48,  169 => 47,  162 => 45,  155 => 41,  148 => 37,  139 => 33,  135 => 31,  133 => 30,  130 => 29,  126 => 28,  119 => 24,  112 => 21,  105 => 18,  103 => 17,  100 => 16,  94 => 14,  88 => 12,  86 => 11,  83 => 10,  80 => 9,  78 => 8,  75 => 7,  72 => 6,  62 => 5,  55 => 1,  53 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@Doctrine/Collector/db.html.twig", "/var/www/html/vendor/doctrine/doctrine-bundle/templates/Collector/db.html.twig");
    }
}
