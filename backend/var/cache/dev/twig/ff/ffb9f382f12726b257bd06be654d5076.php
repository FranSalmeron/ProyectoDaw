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

/* @WebProfiler/Collector/request.html.twig */
class __TwigTemplate_c72e7aff27e2e21cb3dcd18b4ed45f8e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/request.html.twig"));

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
        $macros["helper"] = $this;
        // line 5
        yield "    ";
        $context["request_handler"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 6
            yield "        ";
            yield $macros["helper"]->getTemplateForMacro("macro_set_handler", $context, 6, $this->getSourceContext())->macro_set_handler(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "controller", [], "any", false, false, false, 6)]);
            yield "
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        yield "
    ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "        ";
            $context["redirect_handler"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 11
                yield "            ";
                yield $macros["helper"]->getTemplateForMacro("macro_set_handler", $context, 11, $this->getSourceContext())->macro_set_handler(...[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 11), "controller", [], "any", false, false, false, 11), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 11), "route", [], "any", false, false, false, 11), ((("GET" != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 11), "method", [], "any", false, false, false, 11))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 11), "method", [], "any", false, false, false, 11)) : (""))]);
                yield "
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 13
            yield "    ";
        }
        // line 14
        yield "
    ";
        // line 15
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "forwardtoken", [], "any", false, false, false, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "        ";
            $context["forward_profile"] = CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "childByToken", [CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "forwardtoken", [], "any", false, false, false, 16)], "method", false, false, false, 16);
            // line 17
            yield "        ";
            $context["forward_handler"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 18
                yield "            ";
                yield $macros["helper"]->getTemplateForMacro("macro_set_handler", $context, 18, $this->getSourceContext())->macro_set_handler(...[(((($tmp = ($context["forward_profile"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["forward_profile"] ?? null), "collector", ["request"], "method", false, false, false, 18), "controller", [], "any", false, false, false, 18)) : ("n/a"))]);
                yield "
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 20
            yield "    ";
        }
        // line 21
        yield "
    ";
        // line 22
        $context["request_status_code_color"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statuscode", [], "any", false, false, false, 22) >= 400)) ? ("red") : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statuscode", [], "any", false, false, false, 22) >= 300)) ? ("yellow") : ("green"))));
        // line 23
        yield "
    ";
        // line 24
        $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 25
            yield "        <span class=\"sf-toolbar-status sf-toolbar-status-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["request_status_code_color"] ?? null), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statuscode", [], "any", false, false, false, 25), "html", null, true);
            yield "</span>
        ";
            // line 26
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "route", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 27
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/redirect.svg");
                }
                // line 28
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "forwardtoken", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/forward.svg");
                }
                // line 29
                yield "            <span class=\"sf-toolbar-label\">";
                yield ((("GET" != CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "method", [], "any", false, false, false, 29))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "method", [], "any", false, false, false, 29), "html", null, true)) : (""));
                yield " @</span>
            <span class=\"sf-toolbar-value sf-toolbar-info-piece-additional\">";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "route", [], "any", false, false, false, 30), "html", null, true);
                yield "</span>
        ";
            }
            // line 32
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 33
        yield "
    ";
        // line 34
        $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 35
            yield "        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>HTTP status</b>
                <span>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statuscode", [], "any", false, false, false, 38), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statustext", [], "any", false, false, false, 38), "html", null, true);
            yield "</span>
            </div>

            ";
            // line 41
            if (("GET" != CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "method", [], "any", false, false, false, 41))) {
                // line 42
                yield "<div class=\"sf-toolbar-info-piece\">
                    <b>Method</b>
                    <span>";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "method", [], "any", false, false, false, 44), "html", null, true);
                yield "</span>
                </div>";
            }
            // line 47
            yield "
            <div class=\"sf-toolbar-info-piece\">
                <b>Controller</b>
                <span>";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["request_handler"] ?? null), "html", null, true);
            yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Route name</b>
                <span>";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "route", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "route", [], "any", false, false, false, 55), "n/a")) : ("n/a")), "html", null, true);
            yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Has session</b>
                <span>";
            // line 60
            if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionmetadata", [], "any", false, false, false, 60))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "yes";
            } else {
                yield "no";
            }
            yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Stateless Check</b>
                <span>";
            // line 65
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statelesscheck", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "yes";
            } else {
                yield "no";
            }
            yield "</span>
            </div>
        </div>

        ";
            // line 69
            if (array_key_exists("redirect_handler", $context)) {
                // line 70
                yield "<div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>
                        <span class=\"sf-toolbar-redirection-status sf-toolbar-status-yellow\">";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 73), "status_code", [], "any", false, false, false, 73), "html", null, true);
                yield "</span>
                        Redirect from
                    </b>
                    <span>
                        ";
                // line 77
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["redirect_handler"] ?? null), "html", null, true);
                yield "
                        (<a href=\"";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 78), "token", [], "any", false, false, false, 78)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "redirect", [], "any", false, false, false, 78), "token", [], "any", false, false, false, 78), "html", null, true);
                yield "</a>)
                    </span>
                </div>
            </div>
        ";
            }
            // line 83
            yield "
        ";
            // line 84
            if (array_key_exists("forward_handler", $context)) {
                // line 85
                yield "            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>Forwarded to</b>
                    <span>
                        ";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["forward_handler"] ?? null), "html", null, true);
                yield "
                        (<a href=\"";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "forwardtoken", [], "any", false, false, false, 90)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "forwardtoken", [], "any", false, false, false, 90), "html", null, true);
                yield "</a>)
                    </span>
                </div>
            </div>
        ";
            }
            // line 95
            yield "    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 96
        yield "
    ";
        // line 97
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null)]);
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 100
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 101
        yield "    <span class=\"label\">
        <span class=\"icon\">";
        // line 102
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/request.svg");
        yield "</span>
        <strong>Request / Response</strong>
    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 108
        yield "    ";
        $macros["helper"] = $this;
        // line 109
        yield "
    <h2>
        ";
        // line 111
        yield $macros["helper"]->getTemplateForMacro("macro_set_handler", $context, 111, $this->getSourceContext())->macro_set_handler(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "controller", [], "any", false, false, false, 111)]);
        yield "
    </h2>

    <div class=\"sf-tabs\">
        <div class=\"tab\">
            <h3 class=\"tab-title\">Request</h3>

            <div class=\"tab-content\">
                <h3>GET Parameters</h3>

                ";
        // line 121
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestquery", [], "any", false, false, false, 121), "all", [], "any", false, false, false, 121))) {
            // line 122
            yield "                    <div class=\"empty\">
                        <p>No GET parameters</p>
                    </div>
                ";
        } else {
            // line 126
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestquery", [], "any", false, false, false, 126), "maxDepth" => 1], false);
            yield "
                ";
        }
        // line 128
        yield "
                <h3>POST Parameters</h3>

                ";
        // line 131
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestrequest", [], "any", false, false, false, 131), "all", [], "any", false, false, false, 131))) {
            // line 132
            yield "                    <div class=\"empty\">
                        <p>No POST parameters</p>
                    </div>
                ";
        } else {
            // line 136
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestrequest", [], "any", false, false, false, 136), "maxDepth" => 1], false);
            yield "
                ";
        }
        // line 138
        yield "
                <h4>Uploaded Files</h4>

                ";
        // line 141
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestfiles", [], "any", false, false, false, 141))) {
            // line 142
            yield "                    <div class=\"empty\">
                        <p>No files were uploaded</p>
                    </div>
                ";
        } else {
            // line 146
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestfiles", [], "any", false, false, false, 146), "maxDepth" => 1], false);
            yield "
                ";
        }
        // line 148
        yield "
                <h3>Request Attributes</h3>

                ";
        // line 151
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestattributes", [], "any", false, false, false, 151), "all", [], "any", false, false, false, 151))) {
            // line 152
            yield "                    <div class=\"empty\">
                        <p>No attributes</p>
                    </div>
                ";
        } else {
            // line 156
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestattributes", [], "any", false, false, false, 156)], false);
            yield "
                ";
        }
        // line 158
        yield "
                <h3>Request Headers</h3>
                ";
        // line 160
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestheaders", [], "any", false, false, false, 160), "labels" => ["Header", "Value"], "maxDepth" => 1], false);
        yield "

                <h3>Request Content</h3>

                ";
        // line 164
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "content", [], "any", false, false, false, 164) == false)) {
            // line 165
            yield "                    <div class=\"empty\">
                        <p>Request content not available (it was retrieved as a resource).</p>
                    </div>
                ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 168
($context["collector"] ?? null), "content", [], "any", false, false, false, 168)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 169
            yield "                    <div class=\"sf-tabs\">
                        ";
            // line 170
            $context["prettyJson"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "isJsonRequest", [], "any", false, false, false, 170)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "prettyJson", [], "any", false, false, false, 170)) : (null));
            // line 171
            yield "                        ";
            if ((($tmp =  !(null === ($context["prettyJson"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 172
                yield "                        <div class=\"tab\">
                            <h3 class=\"tab-title\">Pretty</h3>
                            <div class=\"tab-content\">
                                <div class=\"card\" style=\"max-height: 500px; overflow-y: auto;\">
                                    <pre class=\"break-long-words\">";
                // line 176
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["prettyJson"] ?? null), "html", null, true);
                yield "</pre>
                                </div>
                            </div>
                        </div>
                        ";
            }
            // line 181
            yield "
                        <div class=\"tab\">
                            <h3 class=\"tab-title\">Raw</h3>
                            <div class=\"tab-content\">
                                <div class=\"card\">
                                    <pre class=\"break-long-words\">";
            // line 186
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "content", [], "any", false, false, false, 186), "html", null, true);
            yield "</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
        } else {
            // line 192
            yield "                    <div class=\"empty\">
                        <p>No content</p>
                    </div>
                ";
        }
        // line 196
        yield "            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Response</h3>

            <div class=\"tab-content\">
                <h3>Response Headers</h3>

                ";
        // line 205
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "responseheaders", [], "any", false, false, false, 205), "labels" => ["Header", "Value"], "maxDepth" => 1], false);
        yield "
            </div>
        </div>

        <div class=\"tab ";
        // line 209
        yield (((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestcookies", [], "any", false, false, false, 209), "all", [], "any", false, false, false, 209)) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "responsecookies", [], "any", false, false, false, 209), "all", [], "any", false, false, false, 209)))) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Cookies</h3>

            <div class=\"tab-content\">
                <h3>Request Cookies</h3>

                ";
        // line 215
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestcookies", [], "any", false, false, false, 215), "all", [], "any", false, false, false, 215))) {
            // line 216
            yield "                    <div class=\"empty\">
                        <p>No request cookies</p>
                    </div>
                ";
        } else {
            // line 220
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestcookies", [], "any", false, false, false, 220)], false);
            yield "
                ";
        }
        // line 222
        yield "
                <h3>Response Cookies</h3>

                ";
        // line 225
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "responsecookies", [], "any", false, false, false, 225), "all", [], "any", false, false, false, 225))) {
            // line 226
            yield "                    <div class=\"empty\">
                        <p>No response cookies</p>
                    </div>
                ";
        } else {
            // line 230
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "responsecookies", [], "any", false, false, false, 230)], true);
            yield "
                ";
        }
        // line 232
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 235
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionmetadata", [], "any", false, false, false, 235))) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Session";
        // line 236
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionusages", [], "any", false, false, false, 236))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " <span class=\"badge\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionusages", [], "any", false, false, false, 236)), "html", null, true);
            yield "</span>";
        }
        yield "</h3>

            <div class=\"tab-content\">
                <h3>Session Metadata</h3>

                ";
        // line 241
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionmetadata", [], "any", false, false, false, 241))) {
            // line 242
            yield "                    <div class=\"empty\">
                        <p>No session metadata</p>
                    </div>
                ";
        } else {
            // line 246
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", ["data" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionmetadata", [], "any", false, false, false, 246)], false);
            yield "
                ";
        }
        // line 248
        yield "
                <h3>Session Attributes</h3>

                ";
        // line 251
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionattributes", [], "any", false, false, false, 251))) {
            // line 252
            yield "                    <div class=\"empty\">
                        <p>No session attributes</p>
                    </div>
                ";
        } else {
            // line 256
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", ["data" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionattributes", [], "any", false, false, false, 256), "labels" => ["Attribute", "Value"]], false);
            yield "
                ";
        }
        // line 258
        yield "
                <h3>Session Usage</h3>

                <div class=\"metrics\">
                    <div class=\"metric\">
                        <span class=\"value\">";
        // line 263
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionusages", [], "any", false, false, false, 263)), "html", null, true);
        yield "</span>
                        <span class=\"label\">Usages</span>
                    </div>

                    <div class=\"metric\">
                        <span class=\"value\">";
        // line 268
        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "statelesscheck", [], "any", false, false, false, 268)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
        yield "</span>
                        <span class=\"label\">Stateless check enabled</span>
                    </div>
                </div>

                ";
        // line 273
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionusages", [], "any", false, false, false, 273))) {
            // line 274
            yield "                    <div class=\"empty\">
                        <p>Session not used.</p>
                    </div>
                ";
        } else {
            // line 278
            yield "                    <table class=\"session_usages\">
                        <thead>
                        <tr>
                            <th class=\"full-width\">Usage</th>
                        </tr>
                        </thead>

                        <tbody>
                        ";
            // line 286
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sessionusages", [], "any", false, false, false, 286));
            foreach ($context['_seq'] as $context["key"] => $context["usage"]) {
                // line 287
                yield "                            <tr>
                                <td class=\"font-normal\">";
                // line 289
                $context["link"] = $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "file", [], "any", false, false, false, 289), CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "line", [], "any", false, false, false, 289));
                // line 290
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
                    yield "\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "name", [], "any", false, false, false, 290), "html", null, true);
                    yield "\">";
                } else {
                    yield "<span title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "name", [], "any", false, false, false, 290), "html", null, true);
                    yield "\">";
                }
                // line 291
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "name", [], "any", false, false, false, 291), "html", null, true);
                // line 292
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "</a>";
                } else {
                    yield "</span>";
                }
                // line 293
                yield "                                    <div class=\"text-small font-normal\">
                                        ";
                // line 294
                $context["usage_id"] = ("session-usage-trace-" . $context["key"]);
                // line 295
                yield "                                        <a class=\"btn btn-link text-small sf-toggle\" data-toggle-selector=\"#";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["usage_id"] ?? null), "html", null, true);
                yield "\" data-toggle-alt-content=\"Hide trace\">Show trace</a>
                                    </div>
                                    <div id=\"";
                // line 297
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["usage_id"] ?? null), "html", null, true);
                yield "\" class=\"context sf-toggle-content sf-toggle-hidden\">
                                        ";
                // line 298
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["usage"], "trace", [], "any", false, false, false, 298), 2);
                yield "
                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['usage'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 303
            yield "                        </tbody>
                    </table>
                ";
        }
        // line 306
        yield "            </div>
        </div>

        <div class=\"tab ";
        // line 309
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "flashes", [], "any", false, false, false, 309))) ? ("disabled") : (""));
        yield "\">
            <h3 class=\"tab-title\">Flashes</h3>

            <div class=\"tab-content\">
                <h3>Flashes</h3>

                ";
        // line 315
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "flashes", [], "any", false, false, false, 315))) {
            // line 316
            yield "                    <div class=\"empty\">
                        <p>No flash messages were created.</p>
                    </div>
                ";
        } else {
            // line 320
            yield "                    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", ["data" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "flashes", [], "any", false, false, false, 320)], false);
            yield "
                ";
        }
        // line 322
        yield "            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Server Parameters</h3>
            <div class=\"tab-content\">
                <h3>Server Parameters</h3>
                <h4>Defined in .env</h4>
                ";
        // line 330
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "dotenvvars", [], "any", false, false, false, 330)], false);
        yield "

                <h4>Defined as regular env variables</h4>
                ";
        // line 333
        $context["requestserver"] = [];
        // line 334
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "requestserver", [], "any", false, false, false, 334), function ($_____, $__key__) use ($context, $macros) { $context["_"] = $_____; $context["key"] = $__key__; return !CoreExtension::inFilter($context["key"], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "dotenvvars", [], "any", false, false, false, 334), "keys", [], "any", false, false, false, 334)); }));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 335
            yield "                    ";
            $context["requestserver"] = Twig\Extension\CoreExtension::merge(($context["requestserver"] ?? null), [ (string)$context["key"] => $context["value"]]);
            // line 336
            yield "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 337
        yield "                ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", ["data" => ($context["requestserver"] ?? null)], false);
        yield "
            </div>
        </div>

        ";
        // line 341
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "parent", [], "any", false, false, false, 341)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 342
            yield "        <div class=\"tab\">
            <h3 class=\"tab-title\">Parent Request</h3>

            <div class=\"tab-content\">
                <h3>
                    <a href=\"";
            // line 347
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "parent", [], "any", false, false, false, 347), "token", [], "any", false, false, false, 347)]), "html", null, true);
            yield "\">Return to parent request</a>
                    <small>(token = ";
            // line 348
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "parent", [], "any", false, false, false, 348), "token", [], "any", false, false, false, 348), "html", null, true);
            yield ")</small>
                </h3>

                ";
            // line 351
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "parent", [], "any", false, false, false, 351), "getcollector", ["request"], "method", false, false, false, 351), "requestattributes", [], "any", false, false, false, 351)], false);
            yield "
            </div>
        </div>
        ";
        }
        // line 355
        yield "
        ";
        // line 356
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "children", [], "any", false, false, false, 356))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 357
            yield "        <div class=\"tab\">
            <h3 class=\"tab-title\">Sub Requests <span class=\"badge\">";
            // line 358
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "children", [], "any", false, false, false, 358)), "html", null, true);
            yield "</span></h3>

            <div class=\"tab-content\">
                ";
            // line 361
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "children", [], "any", false, false, false, 361));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 362
                yield "                    <h3>
                        ";
                // line 363
                yield $macros["helper"]->getTemplateForMacro("macro_set_handler", $context, 363, $this->getSourceContext())->macro_set_handler(...[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["child"], "getcollector", ["request"], "method", false, false, false, 363), "controller", [], "any", false, false, false, 363)]);
                yield "
                        <small>(token = <a href=\"";
                // line 364
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, $context["child"], "token", [], "any", false, false, false, 364)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "token", [], "any", false, false, false, 364), "html", null, true);
                yield "</a>)</small>
                    </h3>

                    ";
                // line 367
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", ["bag" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["child"], "getcollector", ["request"], "method", false, false, false, 367), "requestattributes", [], "any", false, false, false, 367)], false);
                yield "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 369
            yield "            </div>
        </div>
        ";
        }
        // line 372
        yield "    </div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 375
    public function macro_set_handler($controller = null, $route = null, $method = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "controller" => $controller,
            "route" => $route,
            "method" => $method,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "set_handler"));

            // line 376
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", true, true, false, 376)) {
                // line 377
                if ((($tmp = ((array_key_exists("method", $context)) ? (Twig\Extension\CoreExtension::default(($context["method"] ?? null), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"sf-toolbar-status sf-toolbar-redirection-method\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["method"] ?? null), "html", null, true);
                    yield "</span>";
                }
                // line 378
                $context["link"] = $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", false, false, false, 378), CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "line", [], "any", false, false, false, 378));
                // line 379
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
                    yield "\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", false, false, false, 379), "html", null, true);
                    yield "\">";
                } else {
                    yield "<span title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", false, false, false, 379), "html", null, true);
                    yield "\">";
                }
                // line 381
                if ((($tmp = ((array_key_exists("route", $context)) ? (Twig\Extension\CoreExtension::default(($context["route"] ?? null), false)) : (false))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 382
                    yield "@";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["route"] ?? null), "html", null, true);
                } else {
                    // line 384
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->abbrClass(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", false, false, false, 384))), "html", null, true);
                    // line 385
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "method", [], "any", false, false, false, 385)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((" :: " . CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "method", [], "any", false, false, false, 385)), "html", null, true)) : (""));
                }
                // line 388
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "</a>";
                } else {
                    yield "</span>";
                }
            } else {
                // line 390
                yield "<span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("route", $context)) ? (Twig\Extension\CoreExtension::default(($context["route"] ?? null), ($context["controller"] ?? null))) : (($context["controller"] ?? null))), "html", null, true);
                yield "</span>";
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
        return "@WebProfiler/Collector/request.html.twig";
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
        return array (  920 => 390,  913 => 388,  910 => 385,  908 => 384,  904 => 382,  902 => 381,  890 => 379,  888 => 378,  882 => 377,  879 => 376,  862 => 375,  853 => 372,  848 => 369,  840 => 367,  832 => 364,  828 => 363,  825 => 362,  821 => 361,  815 => 358,  812 => 357,  810 => 356,  807 => 355,  800 => 351,  794 => 348,  790 => 347,  783 => 342,  781 => 341,  773 => 337,  767 => 336,  764 => 335,  759 => 334,  757 => 333,  751 => 330,  741 => 322,  735 => 320,  729 => 316,  727 => 315,  718 => 309,  713 => 306,  708 => 303,  697 => 298,  693 => 297,  687 => 295,  685 => 294,  682 => 293,  676 => 292,  673 => 291,  661 => 290,  659 => 289,  656 => 287,  652 => 286,  642 => 278,  636 => 274,  634 => 273,  626 => 268,  618 => 263,  611 => 258,  605 => 256,  599 => 252,  597 => 251,  592 => 248,  586 => 246,  580 => 242,  578 => 241,  566 => 236,  562 => 235,  557 => 232,  551 => 230,  545 => 226,  543 => 225,  538 => 222,  532 => 220,  526 => 216,  524 => 215,  515 => 209,  508 => 205,  497 => 196,  491 => 192,  482 => 186,  475 => 181,  467 => 176,  461 => 172,  458 => 171,  456 => 170,  453 => 169,  451 => 168,  446 => 165,  444 => 164,  437 => 160,  433 => 158,  427 => 156,  421 => 152,  419 => 151,  414 => 148,  408 => 146,  402 => 142,  400 => 141,  395 => 138,  389 => 136,  383 => 132,  381 => 131,  376 => 128,  370 => 126,  364 => 122,  362 => 121,  349 => 111,  345 => 109,  342 => 108,  332 => 107,  320 => 102,  317 => 101,  307 => 100,  297 => 97,  294 => 96,  290 => 95,  280 => 90,  276 => 89,  270 => 85,  268 => 84,  265 => 83,  255 => 78,  251 => 77,  244 => 73,  239 => 70,  237 => 69,  226 => 65,  214 => 60,  206 => 55,  198 => 50,  193 => 47,  188 => 44,  184 => 42,  182 => 41,  174 => 38,  169 => 35,  167 => 34,  164 => 33,  160 => 32,  155 => 30,  150 => 29,  145 => 28,  140 => 27,  138 => 26,  131 => 25,  129 => 24,  126 => 23,  124 => 22,  121 => 21,  118 => 20,  111 => 18,  108 => 17,  105 => 16,  103 => 15,  100 => 14,  97 => 13,  90 => 11,  87 => 10,  85 => 9,  82 => 8,  75 => 6,  72 => 5,  69 => 4,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/request.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/request.html.twig");
    }
}
