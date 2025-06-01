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

/* @WebProfiler/Collector/http_client.html.twig */
class __TwigTemplate_ffdbb4b9f3cc25d1987cf463262eb118 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/http_client.html.twig"));

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
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 5
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 6
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/http-client.svg");
                yield "
            ";
                // line 7
                $context["status_color"] = "";
                // line 8
                yield "            <span class=\"sf-toolbar-value\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 8), "html", null, true);
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 10
            yield "
        ";
            // line 11
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 12
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Total requests</b>
                <span>";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 14), "html", null, true);
                yield "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>HTTP errors</b>
                <span class=\"sf-toolbar-status ";
                // line 18
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "errorCount", [], "any", false, false, false, 18) > 0)) ? ("sf-toolbar-status-red") : (""));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "errorCount", [], "any", false, false, false, 18), "html", null, true);
                yield "</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 21
            yield "
        ";
            // line 22
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null), "status" => ($context["status_color"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 27
        yield "<span class=\"label ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 27) == 0)) ? ("disabled") : (""));
        yield "\">
    <span class=\"icon\">";
        // line 28
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/http-client.svg");
        yield "</span>
    <strong>HTTP Client</strong>
    ";
        // line 30
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "        <span class=\"count\">
            ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 32), "html", null, true);
            yield "
        </span>
    ";
        }
        // line 35
        yield "</span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 39
        yield "    <h2>HTTP Client</h2>
    ";
        // line 40
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 40) == 0)) {
            // line 41
            yield "        <div class=\"empty\">
            <p>No HTTP requests were made.</p>
        </div>
    ";
        } else {
            // line 45
            yield "        <div class=\"metrics\">
            <div class=\"metric\">
                <span class=\"value\">";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestCount", [], "any", false, false, false, 47), "html", null, true);
            yield "</span>
                <span class=\"label\">Total requests</span>
            </div>
            <div class=\"metric\">
                <span class=\"value\">";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "errorCount", [], "any", false, false, false, 51), "html", null, true);
            yield "</span>
                <span class=\"label\">HTTP errors</span>
            </div>
        </div>
        <h2>Clients</h2>
        <div class=\"sf-tabs\">
            ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "clients", [], "any", false, false, false, 57));
            foreach ($context['_seq'] as $context["name"] => $context["client"]) {
                // line 58
                yield "                <div class=\"tab ";
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "traces", [], "any", false, false, false, 58)) == 0)) ? ("disabled") : (""));
                yield "\">
                    <h3 class=\"tab-title\">";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
                yield " <span class=\"badge\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "traces", [], "any", false, false, false, 59)), "html", null, true);
                yield "</span></h3>
                    <div class=\"tab-content\">
                        ";
                // line 61
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "traces", [], "any", false, false, false, 61)) == 0)) {
                    // line 62
                    yield "                            <div class=\"empty\">
                                <p>No requests were made with the \"";
                    // line 63
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
                    yield "\" service.</p>
                            </div>
                        ";
                } else {
                    // line 66
                    yield "                            <h4>Requests</h4>
                            ";
                    // line 67
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "traces", [], "any", false, false, false, 67));
                    foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                        // line 68
                        yield "                                ";
                        $context["profiler_token"] = "";
                        // line 69
                        yield "                                ";
                        $context["profiler_link"] = "";
                        // line 70
                        yield "                                ";
                        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "info", [], "any", false, true, false, 70), "response_headers", [], "any", true, true, false, 70)) {
                            // line 71
                            yield "                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "info", [], "any", false, false, false, 71), "response_headers", [], "any", false, false, false, 71));
                            foreach ($context['_seq'] as $context["_key"] => $context["header"]) {
                                // line 72
                                yield "                                        ";
                                if (CoreExtension::matches("/^x-debug-token: .*\$/i", $context["header"])) {
                                    // line 73
                                    yield "                                            ";
                                    $context["profiler_token"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["header"], "getValue", [], "any", false, false, false, 73), Twig\Extension\CoreExtension::length($this->env->getCharset(), "x-debug-token: "));
                                    // line 74
                                    yield "                                        ";
                                }
                                // line 75
                                yield "                                        ";
                                if (CoreExtension::matches("/^x-debug-token-link: .*\$/i", $context["header"])) {
                                    // line 76
                                    yield "                                            ";
                                    $context["profiler_link"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["header"], "getValue", [], "any", false, false, false, 76), Twig\Extension\CoreExtension::length($this->env->getCharset(), "x-debug-token-link: "));
                                    // line 77
                                    yield "                                        ";
                                }
                                // line 78
                                yield "                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_key'], $context['header'], $context['_parent']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 79
                            yield "                                ";
                        }
                        // line 80
                        yield "                                <table>
                                    <thead>
                                    <tr>
                                        <th>
                                            <span class=\"label\">";
                        // line 84
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "method", [], "any", false, false, false, 84), "html", null, true);
                        yield "</span>
                                        </th>
                                        <th class=\"full-width\">
                                            ";
                        // line 87
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "url", [], "any", false, false, false, 87), "html", null, true);
                        yield "
                                            ";
                        // line 88
                        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "options", [], "any", false, false, false, 88))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 89
                            yield "                                                ";
                            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "options", [], "any", false, false, false, 89), 1);
                            yield "
                                            ";
                        }
                        // line 91
                        yield "                                        </th>
                                        ";
                        // line 92
                        if ((($context["profiler_token"] ?? null) && ($context["profiler_link"] ?? null))) {
                            // line 93
                            yield "                                            <th>
                                                Profile
                                            </th>
                                        ";
                        }
                        // line 97
                        yield "                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>
                                            ";
                        // line 102
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "http_code", [], "any", false, false, false, 102) >= 500)) {
                            // line 103
                            yield "                                                ";
                            $context["responseStatus"] = "error";
                            // line 104
                            yield "                                            ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "http_code", [], "any", false, false, false, 104) >= 400)) {
                            // line 105
                            yield "                                                ";
                            $context["responseStatus"] = "warning";
                            // line 106
                            yield "                                            ";
                        } else {
                            // line 107
                            yield "                                                ";
                            $context["responseStatus"] = "success";
                            // line 108
                            yield "                                            ";
                        }
                        // line 109
                        yield "                                            <span class=\"label status-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["responseStatus"] ?? null), "html", null, true);
                        yield "\">
                                                ";
                        // line 110
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "http_code", [], "any", false, false, false, 110), "html", null, true);
                        yield "
                                            </span>
                                        </th>
                                        <td>
                                            ";
                        // line 114
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["trace"], "info", [], "any", false, false, false, 114), 1);
                        yield "
                                        </td>
                                        ";
                        // line 116
                        if ((($context["profiler_token"] ?? null) && ($context["profiler_link"] ?? null))) {
                            // line 117
                            yield "                                            <td>
                                                <span><a href=\"";
                            // line 118
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["profiler_link"] ?? null), "html", null, true);
                            yield "\" target=\"_blank\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["profiler_token"] ?? null), "html", null, true);
                            yield "</a></span>
                                            </td>
                                        ";
                        }
                        // line 121
                        yield "                                    </tr>
                                    </tbody>
                                </table>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['trace'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 125
                    yield "                        ";
                }
                // line 126
                yield "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['name'], $context['client'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            yield "        ";
        }
        // line 130
        yield "    </div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Collector/http_client.html.twig";
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
        return array (  399 => 130,  396 => 129,  388 => 126,  385 => 125,  376 => 121,  368 => 118,  365 => 117,  363 => 116,  358 => 114,  351 => 110,  346 => 109,  343 => 108,  340 => 107,  337 => 106,  334 => 105,  331 => 104,  328 => 103,  326 => 102,  319 => 97,  313 => 93,  311 => 92,  308 => 91,  302 => 89,  300 => 88,  296 => 87,  290 => 84,  284 => 80,  281 => 79,  275 => 78,  272 => 77,  269 => 76,  266 => 75,  263 => 74,  260 => 73,  257 => 72,  252 => 71,  249 => 70,  246 => 69,  243 => 68,  239 => 67,  236 => 66,  230 => 63,  227 => 62,  225 => 61,  218 => 59,  213 => 58,  209 => 57,  200 => 51,  193 => 47,  189 => 45,  183 => 41,  181 => 40,  178 => 39,  168 => 38,  159 => 35,  153 => 32,  150 => 31,  148 => 30,  143 => 28,  138 => 27,  128 => 26,  117 => 22,  114 => 21,  105 => 18,  98 => 14,  94 => 12,  92 => 11,  89 => 10,  82 => 8,  80 => 7,  75 => 6,  72 => 5,  69 => 4,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/http_client.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/http_client.html.twig");
    }
}
