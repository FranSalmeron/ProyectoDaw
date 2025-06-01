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

/* @WebProfiler/Collector/config.html.twig */
class __TwigTemplate_8eba31ecd46b855ac877ee57d34ad070 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/config.html.twig"));

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
        if (("unknown" == CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 4))) {
            // line 5
            yield "        ";
            $context["block_status"] = "";
            // line 6
            yield "        ";
            $context["symfony_version_status"] = "Unable to retrieve information about the Symfony version.";
            // line 7
            yield "    ";
        } elseif (("eol" == CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 7))) {
            // line 8
            yield "        ";
            $context["block_status"] = "red";
            // line 9
            yield "        ";
            $context["symfony_version_status"] = "This Symfony version will no longer receive security fixes.";
            // line 10
            yield "    ";
        } elseif (("eom" == CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 10))) {
            // line 11
            yield "        ";
            $context["block_status"] = "yellow";
            // line 12
            yield "        ";
            $context["symfony_version_status"] = "This Symfony version will only receive security fixes.";
            // line 13
            yield "    ";
        } elseif (("dev" == CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 13))) {
            // line 14
            yield "        ";
            $context["block_status"] = "yellow";
            // line 15
            yield "        ";
            $context["symfony_version_status"] = "This Symfony version is still in the development phase.";
            // line 16
            yield "    ";
        } else {
            // line 17
            yield "        ";
            $context["block_status"] = "";
            // line 18
            yield "        ";
            $context["symfony_version_status"] = "";
            // line 19
            yield "    ";
        }
        // line 20
        yield "
    ";
        // line 21
        $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 22
            yield "        <span class=\"sf-toolbar-label\">
            ";
            // line 23
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
            yield "
        </span>
        <span class=\"sf-toolbar-value\">";
            // line 25
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", true, true, false, 25)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyversion", [], "any", false, false, false, 25), "html", null, true)) : ("n/a"));
            yield "</span>
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 27
        yield "
    ";
        // line 28
        $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 29
            yield "        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Profiler token</b>
                <span>
                    ";
            // line 33
            if ((($tmp = ($context["profiler_url"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 34
                yield "                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["profiler_url"] ?? null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 34), "html", null, true);
                yield "</a>
                    ";
            } else {
                // line 36
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 36), "html", null, true);
                yield "
                    ";
            }
            // line 38
            yield "                </span>
            </div>

            ";
            // line 41
            if ((($tmp =  !("n/a" === CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "env", [], "any", false, false, false, 41))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 42
                yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Environment</b>
                    <span>";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "env", [], "any", false, false, false, 44), "html", null, true);
                yield "</span>
                </div>
            ";
            }
            // line 47
            yield "
            ";
            // line 48
            if ((($tmp =  !("n/a" === CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "debug", [], "any", false, false, false, 48))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 49
                yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Debug</b>
                    <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 51
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "debug", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("green") : ("red"));
                yield "\">";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "debug", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("enabled") : ("disabled"));
                yield "</span>
                </div>
            ";
            }
            // line 54
            yield "        </div>

        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece sf-toolbar-info-php\">
                <b>PHP version</b>
                <span";
            // line 59
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversionextra", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversion", [], "any", false, false, false, 59) . CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversionextra", [], "any", false, false, false, 59)), "html", null, true);
                yield "\"";
            }
            yield ">
                    ";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversion", [], "any", false, false, false, 60), "html", null, true);
            yield "
                    &nbsp; <a href=\"";
            // line 61
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler_phpinfo");
            yield "\">View phpinfo()</a>
                </span>
            </div>

            <div class=\"sf-toolbar-info-piece sf-toolbar-info-php-ext\">
                <b>PHP Extensions</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
            // line 67
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasxdebug", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("green") : ("gray"));
            yield "\">xdebug ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasxdebug", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : ("✗"));
            yield "</span>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
            // line 68
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasapcu", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("green") : ("gray"));
            yield "\">APCu ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasapcu", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : ("✗"));
            yield "</span>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
            // line 69
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "haszendopcache", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("green") : ("red"));
            yield "\">OPcache ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "haszendopcache", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : ("✗"));
            yield "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>PHP SAPI</b>
                <span>";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "sapiName", [], "any", false, false, false, 74), "html", null, true);
            yield "</span>
            </div>
        </div>

        <div class=\"sf-toolbar-info-group\">
            ";
            // line 79
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyversion", [], "any", true, true, false, 79)) {
                // line 80
                yield "                <div class=\"sf-toolbar-info-piece\">
                    <b>Resources</b>
                    <span>
                        <a href=\"https://symfony.com/doc/";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyversion", [], "any", false, false, false, 83), "html", null, true);
                yield "/index.html\" rel=\"help\">
                            Read Symfony ";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyversion", [], "any", false, false, false, 84), "html", null, true);
                yield " Docs
                        </a>
                    </span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Help</b>
                    <span>
                        <a href=\"https://symfony.com/support\">
                            Symfony Support Channels
                        </a>
                    </span>
                </div>
            ";
            }
            // line 97
            yield "        </div>
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 99
        yield "
    ";
        // line 100
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => true, "name" => "config", "status" => ($context["block_status"] ?? null), "additional_classes" => "sf-toolbar-block-right", "block_attrs" => (("title=\"" . ($context["symfony_version_status"] ?? null)) . "\"")]);
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 103
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 104
        yield "    <span class=\"label label-status-";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 104) == "eol")) ? ("red") : (((CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyState", [], "any", false, false, false, 104), ["eom", "dev"])) ? ("yellow") : (""))));
        yield "\">
        <span class=\"icon\">";
        // line 105
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/config.svg");
        yield "</span>
        <strong>Configuration</strong>
    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 110
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 111
        yield "    <h2>Symfony Configuration</h2>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyversion", [], "any", false, false, false, 115), "html", null, true);
        yield "</span>
            <span class=\"label\">Symfony version</span>
        </div>

        ";
        // line 119
        if ((($tmp =  !("n/a" === CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "env", [], "any", false, false, false, 119))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 120
            yield "            <div class=\"metric\">
                <span class=\"value\">";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "env", [], "any", false, false, false, 121), "html", null, true);
            yield "</span>
                <span class=\"label\">Environment</span>
            </div>
        ";
        }
        // line 125
        yield "
        ";
        // line 126
        if ((($tmp =  !("n/a" === CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "debug", [], "any", false, false, false, 126))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 127
            yield "            <div class=\"metric\">
                <span class=\"value\">";
            // line 128
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "debug", [], "any", false, false, false, 128)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("enabled") : ("disabled"));
            yield "</span>
                <span class=\"label\">Debug</span>
            </div>
        ";
        }
        // line 132
        yield "    </div>

    ";
        // line 134
        $context["symfony_status"] = ["dev" => "Unstable Version", "stable" => "Stable Version", "eom" => "Maintenance Ended", "eol" => "Version Expired"];
        // line 135
        yield "    ";
        $context["symfony_status_class"] = ["dev" => "warning", "stable" => "success", "eom" => "warning", "eol" => "error"];
        // line 136
        yield "    <table>
        <thead class=\"small\">
            <tr>
                <th>Symfony Status</th>
                <th>Bugs ";
        // line 140
        yield ((CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonystate", [], "any", false, false, false, 140), ["eom", "eol"])) ? ("were") : ("are"));
        yield " fixed until</th>
                <th>Security issues ";
        // line 141
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonystate", [], "any", false, false, false, 141) == "eol")) ? ("were") : ("are"));
        yield " fixed until</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=\"font-normal\">
                    <span class=\"label status-";
        // line 148
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = ($context["symfony_status_class"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonystate", [], "any", false, false, false, 148)] ?? null) : null), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (($_v1 = ($context["symfony_status"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonystate", [], "any", false, false, false, 148)] ?? null) : null)), "html", null, true);
        yield "</span>
                    ";
        // line 149
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonylts", [], "any", false, false, false, 149)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 150
            yield "                        &nbsp; <span class=\"label status-success\">Long-Term Support</span>
                    ";
        }
        // line 152
        yield "                </td>
                <td class=\"font-normal\">";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyeom", [], "any", false, false, false, 153), "html", null, true);
        yield "</td>
                <td class=\"font-normal\">";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyeol", [], "any", false, false, false, 154), "html", null, true);
        yield "</td>
                <td class=\"font-normal\">
                    <a href=\"https://symfony.com/releases/";
        // line 156
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "symfonyminorversion", [], "any", false, false, false, 156), "html", null, true);
        yield "#release-checker\">View roadmap</a>
                </td>
            </tr>
        </tbody>
    </table>

    <h2>PHP Configuration</h2>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversion", [], "any", false, false, false, 166), "html", null, true);
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversionextra", [], "any", false, false, false, 166)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " <span class=\"unit\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpversionextra", [], "any", false, false, false, 166), "html", null, true);
            yield "</span>";
        }
        yield "</span>
            <span class=\"label\">PHP version</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phparchitecture", [], "any", false, false, false, 171), "html", null, true);
        yield " <span class=\"unit\">bits</span></span>
            <span class=\"label\">Architecture</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 176
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phpintllocale", [], "any", false, false, false, 176), "html", null, true);
        yield "</span>
            <span class=\"label\">Intl locale</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "phptimezone", [], "any", false, false, false, 181), "html", null, true);
        yield "</span>
            <span class=\"label\">Timezone</span>
        </div>
    </div>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 188
        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "haszendopcache", [], "any", false, false, false, 188)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
        yield "</span>
            <span class=\"label\">OPcache</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 193
        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasapcu", [], "any", false, false, false, 193)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no-gray"))) . ".svg"));
        yield "</span>
            <span class=\"label\">APCu</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 198
        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "hasxdebug", [], "any", false, false, false, 198)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no-gray"))) . ".svg"));
        yield "</span>
            <span class=\"label\">Xdebug</span>
        </div>
    </div>

    <p>
        <a href=\"";
        // line 204
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler_phpinfo");
        yield "\">View full PHP configuration</a>
    </p>

    ";
        // line 207
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "bundles", [], "any", false, false, false, 207)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 208
            yield "        <h2>Enabled Bundles <small>(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "bundles", [], "any", false, false, false, 208)), "html", null, true);
            yield ")</small></h2>
        <table>
            <thead>
                <tr>
                    <th class=\"key\">Name</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 217
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::sort($this->env, Twig\Extension\CoreExtension::keys(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "bundles", [], "any", false, false, false, 217))));
            foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                // line 218
                yield "                <tr>
                    <th scope=\"row\" class=\"font-normal\">";
                // line 219
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
                yield "</th>
                    <td class=\"font-normal\">";
                // line 220
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "bundles", [], "any", false, false, false, 220)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["name"]] ?? null) : null));
                yield "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['name'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            yield "            </tbody>
        </table>
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Collector/config.html.twig";
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
        return array (  548 => 223,  539 => 220,  535 => 219,  532 => 218,  528 => 217,  515 => 208,  513 => 207,  507 => 204,  498 => 198,  490 => 193,  482 => 188,  472 => 181,  464 => 176,  456 => 171,  443 => 166,  430 => 156,  425 => 154,  421 => 153,  418 => 152,  414 => 150,  412 => 149,  406 => 148,  396 => 141,  392 => 140,  386 => 136,  383 => 135,  381 => 134,  377 => 132,  370 => 128,  367 => 127,  365 => 126,  362 => 125,  355 => 121,  352 => 120,  350 => 119,  343 => 115,  337 => 111,  327 => 110,  315 => 105,  310 => 104,  300 => 103,  290 => 100,  287 => 99,  282 => 97,  266 => 84,  262 => 83,  257 => 80,  255 => 79,  247 => 74,  237 => 69,  231 => 68,  225 => 67,  216 => 61,  212 => 60,  204 => 59,  197 => 54,  189 => 51,  185 => 49,  183 => 48,  180 => 47,  174 => 44,  170 => 42,  168 => 41,  163 => 38,  157 => 36,  149 => 34,  147 => 33,  141 => 29,  139 => 28,  136 => 27,  130 => 25,  125 => 23,  122 => 22,  120 => 21,  117 => 20,  114 => 19,  111 => 18,  108 => 17,  105 => 16,  102 => 15,  99 => 14,  96 => 13,  93 => 12,  90 => 11,  87 => 10,  84 => 9,  81 => 8,  78 => 7,  75 => 6,  72 => 5,  69 => 4,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/config.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/config.html.twig");
    }
}
