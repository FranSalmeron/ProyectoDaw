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

/* @WebProfiler/Profiler/layout.html.twig */
class __TwigTemplate_889b85e1036ff3edff0649fbefa8556a extends Template
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
            'body' => [$this, 'block_body'],
            'summary' => [$this, 'block_summary'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@WebProfiler/Profiler/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/layout.html.twig"));

        $this->parent = $this->load("@WebProfiler/Profiler/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        yield "    ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/header.html.twig", [], false);
        yield "

    <div id=\"summary\">
        ";
        // line 7
        yield from $this->unwrap()->yieldBlock('summary', $context, $blocks);
        // line 93
        yield "    </div>

    <div id=\"content\" class=\"container\">
        <div id=\"main\">
            <div id=\"sidebar\">
                <div id=\"sidebar-shortcuts\">
                    <div class=\"shortcuts\">
                        <a href=\"#\" id=\"sidebarShortcutsMenu\" class=\"visible-small\">
                            <span class=\"icon\">";
        // line 101
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/menu.svg");
        yield "</span>
                        </a>

                        <a class=\"btn btn-sm\" href=\"";
        // line 104
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler_search", ["limit" => 10]);
        yield "\">Last 10</a>
                        <a class=\"btn btn-sm\" href=\"";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", Twig\Extension\CoreExtension::merge(["token" => "latest"], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["request"] ?? null), "query", [], "any", false, false, false, 105), "all", [], "any", false, false, false, 105))), "html", null, true);
        yield "\">Latest</a>

                        <a class=\"sf-toggle btn btn-sm\" data-toggle-selector=\"#sidebar-search\" ";
        // line 107
        if ((array_key_exists("tokens", $context) || array_key_exists("about", $context))) {
            yield "data-toggle-initial=\"display\"";
        }
        yield ">
                            ";
        // line 108
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/search.svg");
        yield " <span class=\"hidden-small\">Search</span>
                        </a>

                        ";
        // line 111
        yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("web_profiler.controller.profiler::searchBarAction", [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["request"] ?? null), "query", [], "any", false, false, false, 111), "all", [], "any", false, false, false, 111)));
        yield "
                    </div>
                </div>

                ";
        // line 115
        if (array_key_exists("templates", $context)) {
            // line 116
            yield "                    <ul id=\"menu-profiler\">
                        ";
            // line 117
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["templates"] ?? null));
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
            foreach ($context['_seq'] as $context["name"] => $context["template"]) {
                // line 118
                yield "                            ";
                $context["menu"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                    // line 119
                    if (                    $this->load($context["template"], 119)->unwrap()->hasBlock("menu", $context)) {
                        // line 120
                        $_v0 = $context;
                        $_v1 = ["collector" => CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "getcollector", [$context["name"]], "method", false, false, false, 120), "profiler_markup_version" => ($context["profiler_markup_version"] ?? null)];
                        if (!is_iterable($_v1)) {
                            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 120, $this->getSourceContext());
                        }
                        $_v1 = CoreExtension::toArray($_v1);
                        $context = $_v1 + $context + $this->env->getGlobals();
                        // line 121
                        yield from                         $this->load($context["template"], 121)->unwrap()->yieldBlock("menu", $context);
                        $context = $_v0;
                    }
                    yield from [];
                })())) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 125
                yield "                            ";
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["menu"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 126
                    yield "                                <li class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
                    yield " ";
                    yield ((($context["name"] == ($context["panel"] ?? null))) ? ("selected") : (""));
                    yield "\">
                                    <a href=\"";
                    // line 127
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => ($context["token"] ?? null), "panel" => $context["name"]]), "html", null, true);
                    yield "\">";
                    yield ($context["menu"] ?? null);
                    yield "</a>
                                </li>
                            ";
                }
                // line 130
                yield "                        ";
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
            unset($context['_seq'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            yield "                    </ul>
                ";
        }
        // line 133
        yield "
                ";
        // line 134
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/settings.html.twig");
        yield "
            </div>

            <div id=\"collector-wrapper\">
                <div id=\"collector-content\">
                    ";
        // line 139
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/base_js.html.twig");
        yield "
                    ";
        // line 140
        yield from $this->unwrap()->yieldBlock('panel', $context, $blocks);
        // line 141
        yield "                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            Sfjs.addEventListener(document.getElementById('sidebarShortcutsMenu'), 'click', function (event) {
                event.preventDefault();
                Sfjs.toggleClass(document.getElementById('sidebar'), 'expanded');
            })
        }());
    </script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_summary(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "summary"));

        // line 8
        yield "            ";
        if (array_key_exists("profile", $context)) {
            // line 9
            yield "                ";
            $context["request_collector"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "collectors", [], "any", false, true, false, 9), "request", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "collectors", [], "any", false, false, false, 9), "request", [], "any", false, false, false, 9), false)) : (false));
            // line 10
            yield "                ";
            $context["status_code"] = (((($tmp = ($context["request_collector"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (((CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "statuscode", [], "any", true, true, false, 10)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "statuscode", [], "any", false, false, false, 10), 0)) : (0))) : (0));
            // line 11
            yield "                ";
            $context["css_class"] = (((($context["status_code"] ?? null) > 399)) ? ("status-error") : ((((($context["status_code"] ?? null) > 299)) ? ("status-warning") : ("status-success"))));
            // line 12
            yield "
                <div class=\"status ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["css_class"] ?? null), "html", null, true);
            yield "\">
                    <div class=\"container\">
                        <h2 class=\"break-long-words\">
                            ";
            // line 16
            if (CoreExtension::inFilter(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "method", [], "any", false, false, false, 16)), ["GET", "HEAD"])) {
                // line 17
                yield "                                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, false, 17), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, false, 17), "html", null, true);
                yield "</a>
                            ";
            } else {
                // line 19
                yield "                                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "url", [], "any", false, false, false, 19), "html", null, true);
                yield "
                                ";
                // line 20
                $context["referer"] = (((($tmp = ($context["request_collector"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "requestheaders", [], "any", false, false, false, 20), "get", ["referer"], "method", false, false, false, 20)) : (null));
                // line 21
                yield "                                ";
                if ((($tmp = ($context["referer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 22
                    yield "                                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["referer"] ?? null), "html", null, true);
                    yield "\" class=\"referer\">Return to referer URL</a>
                                ";
                }
                // line 24
                yield "                            ";
            }
            // line 25
            yield "                        </h2>

                        ";
            // line 27
            if ((($context["request_collector"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "redirect", [], "any", false, false, false, 27))) {
                // line 28
                $context["redirect"] = CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "redirect", [], "any", false, false, false, 28);
                // line 29
                $context["controller"] = CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "controller", [], "any", false, false, false, 29);
                // line 30
                $context["redirect_route"] = ("@" . CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "route", [], "any", false, false, false, 30));
                // line 31
                yield "                            <dl class=\"metadata\">
                                <dt>
                                    <span class=\"label\">";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "status_code", [], "any", false, false, false, 33), "html", null, true);
                yield "</span>
                                    Redirect from
                                </dt>
                                <dd>
                                    ";
                // line 37
                yield ((("GET" != CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "method", [], "any", false, false, false, 37))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "method", [], "any", false, false, false, 37), "html", null, true)) : (""));
                yield "
                                    ";
                // line 38
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "controller", [], "any", false, true, false, 38), "class", [], "any", true, true, false, 38)) {
                    // line 39
                    $context["link"] = $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", false, false, false, 39), CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "line", [], "any", false, false, false, 39));
                    // line 40
                    if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
                        yield "\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", false, false, false, 40), "html", null, true);
                        yield "\">";
                    }
                    // line 41
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["redirect_route"] ?? null), "html", null, true);
                    // line 42
                    if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "</a>";
                    }
                } else {
                    // line 44
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["redirect_route"] ?? null), "html", null, true);
                }
                // line 46
                yield "                                    (<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "token", [], "any", false, false, false, 46), "panel" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["request"] ?? null), "query", [], "any", false, false, false, 46), "get", ["panel", "request"], "method", false, false, false, 46)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["redirect"] ?? null), "token", [], "any", false, false, false, 46), "html", null, true);
                yield "</a>)
                                </dd>
                            </dl>";
            }
            // line 50
            yield "
                        ";
            // line 51
            if ((($context["request_collector"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "forwardtoken", [], "any", false, false, false, 51))) {
                // line 52
                $context["forward_profile"] = CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "childByToken", [CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "forwardtoken", [], "any", false, false, false, 52)], "method", false, false, false, 52);
                // line 53
                yield "                            ";
                $context["controller"] = (((($tmp = ($context["forward_profile"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["forward_profile"] ?? null), "collector", ["request"], "method", false, false, false, 53), "controller", [], "any", false, false, false, 53)) : ("n/a"));
                // line 54
                yield "                            <dl class=\"metadata\">
                                <dt>Forwarded to</dt>
                                <dd>
                                    ";
                // line 57
                $context["link"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", true, true, false, 57)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", false, false, false, 57), CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "line", [], "any", false, false, false, 57))) : (null));
                // line 58
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["link"] ?? null), "html", null, true);
                    yield "\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "file", [], "any", false, false, false, 58), "html", null, true);
                    yield "\">";
                }
                // line 59
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", true, true, false, 59)) {
                    // line 60
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags($this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->abbrClass(CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "class", [], "any", false, false, false, 60))), "html", null, true);
                    // line 61
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "method", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((" :: " . CoreExtension::getAttribute($this->env, $this->source, ($context["controller"] ?? null), "method", [], "any", false, false, false, 61)), "html", null, true)) : (""));
                } else {
                    // line 63
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["controller"] ?? null), "html", null, true);
                }
                // line 65
                if ((($tmp = ($context["link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "</a>";
                }
                // line 66
                yield "                                    (<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "forwardtoken", [], "any", false, false, false, 66)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["request_collector"] ?? null), "forwardtoken", [], "any", false, false, false, 66), "html", null, true);
                yield "</a>)
                                </dd>
                            </dl>";
            }
            // line 70
            yield "
                        <dl class=\"metadata\">
                            <dt>Method</dt>
                            <dd>";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "method", [], "any", false, false, false, 73)), "html", null, true);
            yield "</dd>

                            <dt>HTTP Status</dt>
                            <dd>";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["status_code"] ?? null), "html", null, true);
            yield "</dd>

                            <dt>IP</dt>
                            <dd>
                                <a href=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler_search_results", ["token" => ($context["token"] ?? null), "limit" => 10, "ip" => CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "ip", [], "any", false, false, false, 80)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "ip", [], "any", false, false, false, 80), "html", null, true);
            yield "</a>
                            </dd>

                            <dt>Profiled on</dt>
                            <dd><time datetime=\"";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "time", [], "any", false, false, false, 84), "c"), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "time", [], "any", false, false, false, 84), "r"), "html", null, true);
            yield "</time></dd>

                            <dt>Token</dt>
                            <dd>";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["profile"] ?? null), "token", [], "any", false, false, false, 87), "html", null, true);
            yield "</dd>
                        </dl>
                    </div>
                </div>
            ";
        }
        // line 92
        yield "        ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 140
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        yield "";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Profiler/layout.html.twig";
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
        return array (  453 => 140,  445 => 92,  437 => 87,  429 => 84,  420 => 80,  413 => 76,  407 => 73,  402 => 70,  393 => 66,  389 => 65,  386 => 63,  383 => 61,  381 => 60,  379 => 59,  371 => 58,  369 => 57,  364 => 54,  361 => 53,  359 => 52,  357 => 51,  354 => 50,  345 => 46,  342 => 44,  337 => 42,  335 => 41,  327 => 40,  325 => 39,  323 => 38,  319 => 37,  312 => 33,  308 => 31,  306 => 30,  304 => 29,  302 => 28,  300 => 27,  296 => 25,  293 => 24,  287 => 22,  284 => 21,  282 => 20,  277 => 19,  269 => 17,  267 => 16,  261 => 13,  258 => 12,  255 => 11,  252 => 10,  249 => 9,  246 => 8,  236 => 7,  216 => 141,  214 => 140,  210 => 139,  202 => 134,  199 => 133,  195 => 131,  181 => 130,  173 => 127,  166 => 126,  163 => 125,  157 => 121,  149 => 120,  147 => 119,  144 => 118,  127 => 117,  124 => 116,  122 => 115,  115 => 111,  109 => 108,  103 => 107,  98 => 105,  94 => 104,  88 => 101,  78 => 93,  76 => 7,  69 => 4,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Profiler/layout.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Profiler/layout.html.twig");
    }
}
