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

/* @Security/Collector/security.html.twig */
class __TwigTemplate_9e24de0458176c27ed43b4b7f11662a1 extends Template
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
            'page_title' => [$this, 'block_page_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Security/Collector/security.html.twig"));

        $this->parent = $this->load("@WebProfiler/Profiler/layout.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Security";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
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
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@Security/Collector/icon.svg");
                yield "
            <span class=\"sf-toolbar-value\">";
                // line 9
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "user", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "user", [], "any", false, false, false, 9), "n/a")) : ("n/a")), "html", null, true);
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
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "impersonated", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 14
                    yield "                <div class=\"sf-toolbar-info-group\">
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Impersonator</b>
                        <span>";
                    // line 17
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "impersonatorUser", [], "any", false, false, false, 17), "html", null, true);
                    yield "</span>
                    </div>
                </div>
            ";
                }
                // line 21
                yield "
            <div class=\"sf-toolbar-info-group\">
                ";
                // line 23
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "enabled", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 24
                    yield "                    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 25
                        yield "                        <div class=\"sf-toolbar-info-piece\">
                            <b>Logged in as</b>
                            <span>";
                        // line 27
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "user", [], "any", false, false, false, 27), "html", null, true);
                        yield "</span>
                        </div>

                        <div class=\"sf-toolbar-info-piece\">
                            <b>Authenticated</b>
                            <span class=\"sf-toolbar-status sf-toolbar-status-";
                        // line 32
                        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticated", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("green") : ("yellow"));
                        yield "\">";
                        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticated", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Yes") : ("No"));
                        yield "</span>
                        </div>

                        <div class=\"sf-toolbar-info-piece\">
                            <b>Roles</b>
                            <span>
                                ";
                        // line 38
                        $context["remainingRoles"] = Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "roles", [], "any", false, false, false, 38), 1);
                        // line 39
                        yield "                                ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "roles", [], "any", false, false, false, 39)), "html", null, true);
                        yield "
                                ";
                        // line 40
                        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["remainingRoles"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 41
                            yield "                                    +
                                    <abbr title=\"";
                            // line 42
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(($context["remainingRoles"] ?? null), ", "), "html", null, true);
                            yield "\">
                                        ";
                            // line 43
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["remainingRoles"] ?? null)), "html", null, true);
                            yield " more
                                    </abbr>
                                ";
                        }
                        // line 46
                        yield "                            </span>
                        </div>

                        <div class=\"sf-toolbar-info-piece\">
                            <b>Token class</b>
                            <span>";
                        // line 51
                        yield $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->abbrClass(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "tokenClass", [], "any", false, false, false, 51));
                        yield "</span>
                        </div>
                    ";
                    } else {
                        // line 54
                        yield "                        <div class=\"sf-toolbar-info-piece\">
                            <b>Authenticated</b>
                            <span class=\"sf-toolbar-status sf-toolbar-status-yellow\">No</span>
                        </div>
                    ";
                    }
                    // line 59
                    yield "
                    ";
                    // line 60
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 61
                        yield "                        <div class=\"sf-toolbar-info-piece\">
                            <b>Firewall name</b>
                            <span>";
                        // line 63
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 63), "name", [], "any", false, false, false, 63), "html", null, true);
                        yield "</span>
                        </div>
                    ";
                    }
                    // line 66
                    yield "
                    ";
                    // line 67
                    if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 67) && CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "logoutUrl", [], "any", false, false, false, 67))) {
                        // line 68
                        yield "                        <div class=\"sf-toolbar-info-piece\">
                            <b>Actions</b>
                            <span>
                                <a href=\"";
                        // line 71
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "logoutUrl", [], "any", false, false, false, 71), "html", null, true);
                        yield "\">Logout</a>
                                ";
                        // line 72
                        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "impersonated", [], "any", false, false, false, 72) && CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "impersonationExitPath", [], "any", false, false, false, 72))) {
                            // line 73
                            yield "                                    | <a href=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "impersonationExitPath", [], "any", false, false, false, 73), "html", null, true);
                            yield "\">Exit impersonation</a>
                                ";
                        }
                        // line 75
                        yield "                            </span>
                        </div>
                    ";
                    }
                    // line 78
                    yield "                ";
                } else {
                    // line 79
                    yield "                    <div class=\"sf-toolbar-info-piece\">
                        <span>The security is disabled.</span>
                    </div>
                ";
                }
                // line 83
                yield "            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 85
            yield "
        ";
            // line 86
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 91
        yield "    <span class=\"label ";
        yield ((( !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 91) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 91))) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 92
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@Security/Collector/icon.svg");
        yield "</span>
        <strong>Security</strong>
    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 97
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 98
        yield "    <h2>Security</h2>
    ";
        // line 99
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "enabled", [], "any", false, false, false, 99)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 100
            yield "        <div class=\"sf-tabs\">
            <div class=\"tab ";
            // line 101
            yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 101))) ? ("disabled") : (""));
            yield "\">
                <h3 class=\"tab-title\">Token</h3>

                <div class=\"tab-content\">
                    ";
            // line 105
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 106
                yield "                        <div class=\"metrics\">
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "user", [], "any", false, false, false, 108), "html", null, true);
                yield "</span>
                                <span class=\"label\">Username</span>
                            </div>

                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 113
                yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticated", [], "any", false, false, false, 113)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
                yield "</span>
                                <span class=\"label\">Authenticated</span>
                            </div>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th scope=\"col\" class=\"key\">Property</th>
                                    <th scope=\"col\">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Roles</th>
                                    <td>
                                        ";
                // line 129
                yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "roles", [], "any", false, false, false, 129))) ? ("none") : ($this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "roles", [], "any", false, false, false, 129), 1)));
                yield "

                                        ";
                // line 131
                if (( !CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticated", [], "any", false, false, false, 131) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "roles", [], "any", false, false, false, 131)))) {
                    // line 132
                    yield "                                            <p class=\"help\">User is not authenticated probably because they have no roles.</p>
                                        ";
                }
                // line 134
                yield "                                    </td>
                                </tr>

                                ";
                // line 137
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "supportsRoleHierarchy", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 138
                    yield "                                <tr>
                                    <th>Inherited Roles</th>
                                    <td>";
                    // line 140
                    yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "inheritedRoles", [], "any", false, false, false, 140))) ? ("none") : ($this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "inheritedRoles", [], "any", false, false, false, 140), 1)));
                    yield "</td>
                                </tr>
                                ";
                }
                // line 143
                yield "
                                ";
                // line 144
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 145
                    yield "                                <tr>
                                    <th>Token</th>
                                    <td>";
                    // line 147
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "token", [], "any", false, false, false, 147));
                    yield "</td>
                                </tr>
                                ";
                }
                // line 150
                yield "                            </tbody>
                        </table>
                    ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 152
($context["collector"] ?? null), "enabled", [], "any", false, false, false, 152)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 153
                yield "                        <div class=\"empty\">
                            <p>There is no security token.</p>
                        </div>
                    ";
            }
            // line 157
            yield "                </div>
            </div>

            <div class=\"tab ";
            // line 160
            yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 160), "security_enabled", [], "any", false, false, false, 160))) ? ("disabled") : (""));
            yield "\">
                <h3 class=\"tab-title\">Firewall</h3>
                <div class=\"tab-content\">
                    ";
            // line 163
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 163)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 164
                yield "                        <div class=\"metrics\">
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 166
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 166), "name", [], "any", false, false, false, 166), "html", null, true);
                yield "</span>
                                <span class=\"label\">Name</span>
                            </div>
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 170
                yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 170), "security_enabled", [], "any", false, false, false, 170)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
                yield "</span>
                                <span class=\"label\">Security enabled</span>
                            </div>
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 174
                yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 174), "stateless", [], "any", false, false, false, 174)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
                yield "</span>
                                <span class=\"label\">Stateless</span>
                            </div>
                        </div>

                        ";
                // line 179
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 179), "security_enabled", [], "any", false, false, false, 179)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 180
                    yield "                            <h4>Configuration</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th scope=\"col\" class=\"key\">Key</th>
                                        <th scope=\"col\">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>provider</th>
                                        <td>";
                    // line 191
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 191), "provider", [], "any", false, false, false, 191)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 191), "provider", [], "any", false, false, false, 191), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>context</th>
                                        <td>";
                    // line 195
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 195), "context", [], "any", false, false, false, 195)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 195), "context", [], "any", false, false, false, 195), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>entry_point</th>
                                        <td>";
                    // line 199
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 199), "entry_point", [], "any", false, false, false, 199)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 199), "entry_point", [], "any", false, false, false, 199), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>user_checker</th>
                                        <td>";
                    // line 203
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 203), "user_checker", [], "any", false, false, false, 203)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 203), "user_checker", [], "any", false, false, false, 203), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>access_denied_handler</th>
                                        <td>";
                    // line 207
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 207), "access_denied_handler", [], "any", false, false, false, 207)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 207), "access_denied_handler", [], "any", false, false, false, 207), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>access_denied_url</th>
                                        <td>";
                    // line 211
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 211), "access_denied_url", [], "any", false, false, false, 211)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 211), "access_denied_url", [], "any", false, false, false, 211), "html", null, true)) : ("(none)"));
                    yield "</td>
                                    </tr>
                                    <tr>
                                        <th>authenticators</th>
                                        <td>";
                    // line 215
                    yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 215), "authenticators", [], "any", false, false, false, 215))) ? ("(none)") : ($this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "firewall", [], "any", false, false, false, 215), "authenticators", [], "any", false, false, false, 215), 1)));
                    yield "</td>
                                    </tr>
                                </tbody>
                            </table>
                        ";
                }
                // line 220
                yield "                    ";
            }
            // line 221
            yield "                </div>
            </div>

            <div class=\"tab ";
            // line 224
            yield ((Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", true, true, false, 224)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", false, false, false, 224), [])) : ([])))) ? ("disabled") : (""));
            yield "\">
                <h3 class=\"tab-title\">Listeners</h3>
                <div class=\"tab-content\">
                    ";
            // line 227
            if (Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", true, true, false, 227)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", false, false, false, 227), [])) : ([])))) {
                // line 228
                yield "                        <div class=\"empty\">
                            <p>No security listeners have been recorded. Check that debugging is enabled in the kernel.</p>
                        </div>
                    ";
            } else {
                // line 232
                yield "                        <table>
                            <thead>
                            <tr>
                                <th>Listener</th>
                                <th>Duration</th>
                                <th>Response</th>
                            </tr>
                            </thead>

                            ";
                // line 241
                $context["previous_event"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", false, false, false, 241));
                // line 242
                yield "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", false, false, false, 242));
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
                foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                    // line 243
                    yield "                                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 243) || ($context["listener"] != ($context["previous_event"] ?? null)))) {
                        // line 244
                        yield "                                    ";
                        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 244)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 245
                            yield "                                        </tbody>
                                    ";
                        }
                        // line 247
                        yield "                                    <tbody>
                                    ";
                        // line 248
                        $context["previous_event"] = $context["listener"];
                        // line 249
                        yield "                                ";
                    }
                    // line 250
                    yield "
                                <tr>
                                    <td class=\"font-normal\">";
                    // line 252
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "stub", [], "any", false, false, false, 252));
                    yield "</td>
                                    <td class=\"no-wrap\">";
                    // line 253
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "time", [], "any", false, false, false, 253) * 1000)), "html", null, true);
                    yield " ms</td>
                                    <td class=\"font-normal\">";
                    // line 254
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "response", [], "any", false, false, false, 254)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "response", [], "any", false, false, false, 254))) : ("(none)"));
                    yield "</td>
                                </tr>

                                ";
                    // line 257
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 257)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 258
                        yield "                                    </tbody>
                                ";
                    }
                    // line 260
                    yield "                            ";
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
                unset($context['_seq'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 261
                yield "                        </table>
                    ";
            }
            // line 263
            yield "                </div>
            </div>

            <div class=\"tab ";
            // line 266
            yield ((Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticators", [], "any", true, true, false, 266)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticators", [], "any", false, false, false, 266), [])) : ([])))) ? ("disabled") : (""));
            yield "\">
                <h3 class=\"tab-title\">Authenticators</h3>
                <div class=\"tab-content\">
                    ";
            // line 269
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticators", [], "any", true, true, false, 269)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticators", [], "any", false, false, false, 269), [])) : ([])))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 270
                yield "                        <table>
                            <thead>
                            <tr>
                                <th>Authenticator</th>
                                <th>Supports</th>
                                <th>Duration</th>
                                <th>Passport</th>
                            </tr>
                            </thead>

                            ";
                // line 280
                $context["previous_event"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "listeners", [], "any", false, false, false, 280));
                // line 281
                yield "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "authenticators", [], "any", false, false, false, 281));
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
                foreach ($context['_seq'] as $context["_key"] => $context["authenticator"]) {
                    // line 282
                    yield "                                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 282) || ($context["authenticator"] != ($context["previous_event"] ?? null)))) {
                        // line 283
                        yield "                                    ";
                        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 283)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 284
                            yield "                                        </tbody>
                                    ";
                        }
                        // line 286
                        yield "
                                    <tbody>
                                    ";
                        // line 288
                        $context["previous_event"] = $context["authenticator"];
                        // line 289
                        yield "                                ";
                    }
                    // line 290
                    yield "
                                <tr>
                                    <td class=\"font-normal\">";
                    // line 292
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["authenticator"], "stub", [], "any", false, false, false, 292));
                    yield "</td>
                                    <td class=\"no-wrap\">";
                    // line 293
                    yield Twig\Extension\CoreExtension::include($this->env, $context, (("@WebProfiler/Icon/" . (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["authenticator"], "supports", [], "any", false, false, false, 293)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yes") : ("no"))) . ".svg"));
                    yield "</td>
                                    <td class=\"no-wrap\">";
                    // line 294
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%0.2f", (CoreExtension::getAttribute($this->env, $this->source, $context["authenticator"], "duration", [], "any", false, false, false, 294) * 1000)), "html", null, true);
                    yield " ms</td>
                                    <td class=\"font-normal\">";
                    // line 295
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["authenticator"], "passport", [], "any", false, false, false, 295)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["authenticator"], "passport", [], "any", false, false, false, 295))) : ("(none)"));
                    yield "</td>
                                </tr>

                                ";
                    // line 298
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 298)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 299
                        yield "                                    </tbody>
                                ";
                    }
                    // line 301
                    yield "                            ";
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
                unset($context['_seq'], $context['_key'], $context['authenticator'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 302
                yield "                        </table>
                    ";
            } else {
                // line 304
                yield "                        <div class=\"empty\">
                            <p>No authenticators have been recorded. Check previous profiles on your authentication endpoint.</p>
                        </div>
                    ";
            }
            // line 308
            yield "                </div>
            </div>

            <div class=\"tab ";
            // line 311
            yield ((Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "accessDecisionLog", [], "any", true, true, false, 311)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "accessDecisionLog", [], "any", false, false, false, 311), [])) : ([])))) ? ("disabled") : (""));
            yield "\">
                <h3 class=\"tab-title\">Access Decision</h3>
                <div class=\"tab-content\">
                    ";
            // line 314
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voters", [], "any", true, true, false, 314)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voters", [], "any", false, false, false, 314), [])) : ([])))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 315
                yield "                        <div class=\"metrics\">
                            <div class=\"metric\">
                                <span class=\"value\">";
                // line 317
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voterStrategy", [], "any", true, true, false, 317)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voterStrategy", [], "any", false, false, false, 317), "unknown")) : ("unknown")), "html", null, true);
                yield "</span>
                                <span class=\"label\">Strategy</span>
                            </div>
                        </div>

                        <table class=\"voters\">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Voter class</th>
                                </tr>
                            </thead>

                            <tbody>
                                ";
                // line 331
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voters", [], "any", false, false, false, 331));
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
                foreach ($context['_seq'] as $context["_key"] => $context["voter"]) {
                    // line 332
                    yield "                                    <tr>
                                        <td class=\"font-normal text-small text-muted nowrap\">";
                    // line 333
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 333), "html", null, true);
                    yield "</td>
                                        <td class=\"font-normal\">";
                    // line 334
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["voter"]);
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
                unset($context['_seq'], $context['_key'], $context['voter'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 337
                yield "                            </tbody>
                        </table>
                    ";
            }
            // line 340
            yield "                    ";
            if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "accessDecisionLog", [], "any", true, true, false, 340)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "accessDecisionLog", [], "any", false, false, false, 340), [])) : ([])))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 341
                yield "                        <h2>Access decision log</h2>

                        <table class=\"decision-log\">
                            <col style=\"width: 30px\">
                            <col style=\"width: 120px\">
                            <col style=\"width: 25%\">
                            <col style=\"width: 60%\">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Result</th>
                                    <th>Attributes</th>
                                    <th>Object</th>
                                </tr>
                            </thead>

                            <tbody>
                                ";
                // line 359
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "accessDecisionLog", [], "any", false, false, false, 359));
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
                foreach ($context['_seq'] as $context["_key"] => $context["decision"]) {
                    // line 360
                    yield "                                    <tr class=\"voter_result\">
                                        <td class=\"font-normal text-small text-muted nowrap\">";
                    // line 361
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 361), "html", null, true);
                    yield "</td>
                                        <td class=\"font-normal\">
                                            ";
                    // line 363
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "result", [], "any", false, false, false, 363)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("<span class=\"label status-success same-width\">GRANTED</span>") : ("<span class=\"label status-error same-width\">DENIED</span>"));
                    // line 366
                    yield "
                                        </td>
                                        <td>
                                            ";
                    // line 369
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "attributes", [], "any", false, false, false, 369)) == 1)) {
                        // line 370
                        yield "                                                ";
                        $context["attribute"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "attributes", [], "any", false, false, false, 370));
                        // line 371
                        yield "                                                ";
                        if (CoreExtension::getAttribute($this->env, $this->source, ($context["attribute"] ?? null), "expression", [], "any", true, true, false, 371)) {
                            // line 372
                            yield "                                                    Expression: <pre><code>";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["attribute"] ?? null), "expression", [], "any", false, false, false, 372), "html", null, true);
                            yield "</code></pre>
                                                ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source,                         // line 373
($context["attribute"] ?? null), "type", [], "any", false, false, false, 373) == "string")) {
                            // line 374
                            yield "                                                    ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["attribute"] ?? null), "html", null, true);
                            yield "
                                                ";
                        } else {
                            // line 376
                            yield "                                                     ";
                            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, ($context["attribute"] ?? null));
                            yield "
                                                ";
                        }
                        // line 378
                        yield "                                            ";
                    } else {
                        // line 379
                        yield "                                                ";
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "attributes", [], "any", false, false, false, 379));
                        yield "
                                            ";
                    }
                    // line 381
                    yield "                                        </td>
                                        <td>";
                    // line 382
                    yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "seek", ["object"], "method", false, false, false, 382));
                    yield "</td>
                                    </tr>
                                    <tr class=\"voter_details\">
                                        <td></td>
                                        <td colspan=\"3\">
                                        ";
                    // line 387
                    if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "voter_details", [], "any", false, false, false, 387))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 388
                        yield "                                            ";
                        $context["voter_details_id"] = ("voter-details-" . CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 388));
                        // line 389
                        yield "                                            <div id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["voter_details_id"] ?? null), "html", null, true);
                        yield "\" class=\"sf-toggle-content sf-toggle-hidden\">
                                                <table>
                                                   <tbody>
                                                    ";
                        // line 392
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["decision"], "voter_details", [], "any", false, false, false, 392));
                        foreach ($context['_seq'] as $context["_key"] => $context["voter_detail"]) {
                            // line 393
                            yield "                                                        <tr>
                                                            <td class=\"font-normal\">";
                            // line 394
                            yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, (($_v0 = $context["voter_detail"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["class"] ?? null) : null));
                            yield "</td>
                                                            ";
                            // line 395
                            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "voterStrategy", [], "any", false, false, false, 395) == "unanimous")) {
                                // line 396
                                yield "                                                            <td class=\"font-normal text-small\">attribute ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v1 = (($_v2 = $context["voter_detail"]) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["attributes"] ?? null) : null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[0] ?? null) : null), "html", null, true);
                                yield "</td>
                                                            ";
                            }
                            // line 398
                            yield "                                                            <td class=\"font-normal text-small\">
                                                                ";
                            // line 399
                            if (((($_v3 = $context["voter_detail"]) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3["vote"] ?? null) : null) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Security\\Core\\Authorization\\Voter\\VoterInterface::ACCESS_GRANTED"))) {
                                // line 400
                                yield "                                                                    ACCESS GRANTED
                                                                ";
                            } elseif (((($_v4 =                             // line 401
$context["voter_detail"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["vote"] ?? null) : null) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Security\\Core\\Authorization\\Voter\\VoterInterface::ACCESS_ABSTAIN"))) {
                                // line 402
                                yield "                                                                    ACCESS ABSTAIN
                                                                ";
                            } elseif (((($_v5 =                             // line 403
$context["voter_detail"]) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["vote"] ?? null) : null) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Security\\Core\\Authorization\\Voter\\VoterInterface::ACCESS_DENIED"))) {
                                // line 404
                                yield "                                                                    ACCESS DENIED
                                                                ";
                            } else {
                                // line 406
                                yield "                                                                    unknown (";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = $context["voter_detail"]) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["vote"] ?? null) : null), "html", null, true);
                                yield ")
                                                                ";
                            }
                            // line 408
                            yield "                                                            </td>
                                                        </tr>
                                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['voter_detail'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 411
                        yield "                                                    </tbody>
                                                </table>
                                            </div>
                                            <a class=\"btn btn-link text-small sf-toggle\" data-toggle-selector=\"#";
                        // line 414
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["voter_details_id"] ?? null), "html", null, true);
                        yield "\" data-toggle-alt-content=\"Hide voter details\">Show voter details</a>
                                        ";
                    }
                    // line 416
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
                unset($context['_seq'], $context['_key'], $context['decision'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 419
                yield "                            </tbody>
                        </table>
                    </div>
                ";
            }
            // line 423
            yield "            </div>
        </div>
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
        return "@Security/Collector/security.html.twig";
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
        return array (  1019 => 423,  1013 => 419,  997 => 416,  992 => 414,  987 => 411,  979 => 408,  973 => 406,  969 => 404,  967 => 403,  964 => 402,  962 => 401,  959 => 400,  957 => 399,  954 => 398,  948 => 396,  946 => 395,  942 => 394,  939 => 393,  935 => 392,  928 => 389,  925 => 388,  923 => 387,  915 => 382,  912 => 381,  906 => 379,  903 => 378,  897 => 376,  891 => 374,  889 => 373,  884 => 372,  881 => 371,  878 => 370,  876 => 369,  871 => 366,  869 => 363,  864 => 361,  861 => 360,  844 => 359,  824 => 341,  821 => 340,  816 => 337,  799 => 334,  795 => 333,  792 => 332,  775 => 331,  758 => 317,  754 => 315,  752 => 314,  746 => 311,  741 => 308,  735 => 304,  731 => 302,  717 => 301,  713 => 299,  711 => 298,  705 => 295,  701 => 294,  697 => 293,  693 => 292,  689 => 290,  686 => 289,  684 => 288,  680 => 286,  676 => 284,  673 => 283,  670 => 282,  652 => 281,  650 => 280,  638 => 270,  636 => 269,  630 => 266,  625 => 263,  621 => 261,  607 => 260,  603 => 258,  601 => 257,  595 => 254,  591 => 253,  587 => 252,  583 => 250,  580 => 249,  578 => 248,  575 => 247,  571 => 245,  568 => 244,  565 => 243,  547 => 242,  545 => 241,  534 => 232,  528 => 228,  526 => 227,  520 => 224,  515 => 221,  512 => 220,  504 => 215,  497 => 211,  490 => 207,  483 => 203,  476 => 199,  469 => 195,  462 => 191,  449 => 180,  447 => 179,  439 => 174,  432 => 170,  425 => 166,  421 => 164,  419 => 163,  413 => 160,  408 => 157,  402 => 153,  400 => 152,  396 => 150,  390 => 147,  386 => 145,  384 => 144,  381 => 143,  375 => 140,  371 => 138,  369 => 137,  364 => 134,  360 => 132,  358 => 131,  353 => 129,  334 => 113,  326 => 108,  322 => 106,  320 => 105,  313 => 101,  310 => 100,  308 => 99,  305 => 98,  295 => 97,  283 => 92,  278 => 91,  268 => 90,  257 => 86,  254 => 85,  249 => 83,  243 => 79,  240 => 78,  235 => 75,  229 => 73,  227 => 72,  223 => 71,  218 => 68,  216 => 67,  213 => 66,  207 => 63,  203 => 61,  201 => 60,  198 => 59,  191 => 54,  185 => 51,  178 => 46,  172 => 43,  168 => 42,  165 => 41,  163 => 40,  158 => 39,  156 => 38,  145 => 32,  137 => 27,  133 => 25,  130 => 24,  128 => 23,  124 => 21,  117 => 17,  112 => 14,  109 => 13,  107 => 12,  104 => 11,  98 => 9,  93 => 8,  90 => 7,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@Security/Collector/security.html.twig", "/var/www/html/vendor/symfony/security-bundle/Resources/views/Collector/security.html.twig");
    }
}
