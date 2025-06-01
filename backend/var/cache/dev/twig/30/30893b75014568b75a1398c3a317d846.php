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

/* @WebProfiler/Collector/translation.html.twig */
class __TwigTemplate_0cbce2bcbe6e16ecafa050690966c951 extends Template
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
            'messages' => [$this, 'block_messages'],
            'defined_messages' => [$this, 'block_defined_messages'],
            'fallback_messages' => [$this, 'block_fallback_messages'],
            'missing_messages' => [$this, 'block_missing_messages'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/translation.html.twig"));

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
        if ((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "messages", [], "any", false, false, false, 6))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        ";
            $context["icon"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 8
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/translation.svg");
                yield "
            ";
                // line 9
                $context["status_color"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("red") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yellow") : (""))));
                // line 10
                yield "            ";
                $context["error_count"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 10) + CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 10));
                // line 11
                yield "            <span class=\"sf-toolbar-value\">";
                yield ((($context["error_count"] ?? null)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error_count"], "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countDefines", [], "any", false, false, false, 11), "html", null, true)));
                yield "</span>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 13
            yield "
        ";
            // line 14
            $context["text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 15
                yield "            <div class=\"sf-toolbar-info-piece\">
                <b>Default locale</b>
                <span class=\"sf-toolbar-status\">
                    ";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "locale", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "locale", [], "any", false, false, false, 18), "-")) : ("-")), "html", null, true);
                yield "
                </span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Missing messages</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 23
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("red") : (""));
                yield "\">
                    ";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 24), "html", null, true);
                yield "
                </span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Fallback messages</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-";
                // line 30
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("yellow") : (""));
                yield "\">
                    ";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 31), "html", null, true);
                yield "
                </span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Defined messages</b>
                <span class=\"sf-toolbar-status\">";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countDefines", [], "any", false, false, false, 37), "html", null, true);
                yield "</span>
            </div>
        ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 40
            yield "
        ";
            // line 41
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => ($context["profiler_url"] ?? null), "status" => ($context["status_color"] ?? null)]);
            yield "
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 45
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 46
        yield "    <span class=\"label label-status-";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("error") : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("warning") : (""))));
        yield " ";
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "messages", [], "any", false, false, false, 46))) ? ("disabled") : (""));
        yield "\">
        <span class=\"icon\">";
        // line 47
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/translation.svg");
        yield "</span>
        <strong>Translation</strong>
        ";
        // line 49
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 49) || CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 49))) {
            // line 50
            yield "            ";
            $context["error_count"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 50) + CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 50));
            // line 51
            yield "            <span class=\"count\">
                <span>";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error_count"] ?? null), "html", null, true);
            yield "</span>
            </span>
        ";
        }
        // line 55
        yield "    </span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 58
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 59
        yield "    <h2>Translation</h2>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "locale", [], "any", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "locale", [], "any", false, false, false, 63), "-")) : ("-")), "html", null, true);
        yield "</span>
            <span class=\"label\">Default locale</span>
        </div>
        <div class=\"metric\">
            <span class=\"value\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "fallbackLocales", [], "any", false, false, false, 67), ", "), "-"), "html", null, true);
        yield "</span>
            <span class=\"label\">Fallback locale";
        // line 68
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "fallbackLocales", [], "any", false, false, false, 68)) != 1)) ? ("s") : (""));
        yield "</span>
        </div>
    </div>

    <h2>Messages</h2>

    ";
        // line 74
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "messages", [], "any", false, false, false, 74))) {
            // line 75
            yield "        <div class=\"empty\">
            <p>No translations have been called.</p>
        </div>
    ";
        } else {
            // line 79
            yield "        ";
            yield from $this->unwrap()->yieldBlock('messages', $context, $blocks);
            // line 161
            yield "    ";
        }
        // line 162
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_messages(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "messages"));

        // line 80
        yield "
        ";
        // line 82
        yield "        ";
        [$context["messages_defined"], $context["messages_missing"], $context["messages_fallback"]] =         [[], [], []];
        // line 83
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "messages", [], "any", false, false, false, 83));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 84
            yield "            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "state", [], "any", false, false, false, 84) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Translation\\DataCollectorTranslator::MESSAGE_DEFINED"))) {
                // line 85
                yield "                ";
                $context["messages_defined"] = Twig\Extension\CoreExtension::merge(($context["messages_defined"] ?? null), [$context["message"]]);
                // line 86
                yield "            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "state", [], "any", false, false, false, 86) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Translation\\DataCollectorTranslator::MESSAGE_MISSING"))) {
                // line 87
                yield "                ";
                $context["messages_missing"] = Twig\Extension\CoreExtension::merge(($context["messages_missing"] ?? null), [$context["message"]]);
                // line 88
                yield "            ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "state", [], "any", false, false, false, 88) == Twig\Extension\CoreExtension::constant("Symfony\\Component\\Translation\\DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK"))) {
                // line 89
                yield "                ";
                $context["messages_fallback"] = Twig\Extension\CoreExtension::merge(($context["messages_fallback"] ?? null), [$context["message"]]);
                // line 90
                yield "            ";
            }
            // line 91
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        yield "
        <div class=\"sf-tabs\">
            <div class=\"tab ";
        // line 94
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 94) == 0)) ? ("active") : (""));
        yield "\">
                <h3 class=\"tab-title\">Defined <span class=\"badge\">";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countDefines", [], "any", false, false, false, 95), "html", null, true);
        yield "</span></h3>

                <div class=\"tab-content\">
                    <p class=\"help\">
                        These messages are correctly translated into the given locale.
                    </p>

                    ";
        // line 102
        if (Twig\Extension\CoreExtension::testEmpty(($context["messages_defined"] ?? null))) {
            // line 103
            yield "                        <div class=\"empty\">
                            <p>None of the used translation messages are defined for the given locale.</p>
                        </div>
                    ";
        } else {
            // line 107
            yield "                        ";
            yield from $this->unwrap()->yieldBlock('defined_messages', $context, $blocks);
            // line 110
            yield "                    ";
        }
        // line 111
        yield "                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Fallback <span class=\"badge ";
        // line 115
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("status-warning") : (""));
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countFallbacks", [], "any", false, false, false, 115), "html", null, true);
        yield "</span></h3>

                <div class=\"tab-content\">
                    <p class=\"help\">
                        These messages are not available for the given locale
                        but Symfony found them in the fallback locale catalog.
                    </p>

                    ";
        // line 123
        if (Twig\Extension\CoreExtension::testEmpty(($context["messages_fallback"] ?? null))) {
            // line 124
            yield "                        <div class=\"empty\">
                            <p>No fallback translation messages were used.</p>
                        </div>
                    ";
        } else {
            // line 128
            yield "                        ";
            yield from $this->unwrap()->yieldBlock('fallback_messages', $context, $blocks);
            // line 131
            yield "                    ";
        }
        // line 132
        yield "                </div>
            </div>

            <div class=\"tab ";
        // line 135
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 135) > 0)) ? ("active") : (""));
        yield "\">
                <h3 class=\"tab-title\">Missing <span class=\"badge ";
        // line 136
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 136)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("status-error") : (""));
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "countMissings", [], "any", false, false, false, 136), "html", null, true);
        yield "</span></h3>

                <div class=\"tab-content\">
                    <p class=\"help\">
                        These messages are not available for the given locale and cannot
                        be found in the fallback locales. Add them to the translation
                        catalogue to avoid Symfony outputting untranslated contents.
                    </p>

                    ";
        // line 145
        if (Twig\Extension\CoreExtension::testEmpty(($context["messages_missing"] ?? null))) {
            // line 146
            yield "                        <div class=\"empty\">
                            <p>There are no messages of this category.</p>
                        </div>
                    ";
        } else {
            // line 150
            yield "                        ";
            yield from $this->unwrap()->yieldBlock('missing_messages', $context, $blocks);
            // line 153
            yield "                    ";
        }
        // line 154
        yield "                </div>
            </div>
        </div>

        <script>Sfjs.createFilters();</script>

        ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_defined_messages(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "defined_messages"));

        // line 108
        yield "                            ";
        yield $macros["helper"]->getTemplateForMacro("macro_render_table", $context, 108, $this->getSourceContext())->macro_render_table(...[($context["messages_defined"] ?? null)]);
        yield "
                        ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 128
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_fallback_messages(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "fallback_messages"));

        // line 129
        yield "                            ";
        yield $macros["helper"]->getTemplateForMacro("macro_render_table", $context, 129, $this->getSourceContext())->macro_render_table(...[($context["messages_fallback"] ?? null), true]);
        yield "
                        ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 150
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_missing_messages(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "missing_messages"));

        // line 151
        yield "                            ";
        yield $macros["helper"]->getTemplateForMacro("macro_render_table", $context, 151, $this->getSourceContext())->macro_render_table(...[($context["messages_missing"] ?? null)]);
        yield "
                        ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 165
    public function macro_render_table($messages = null, $is_fallback = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "messages" => $messages,
            "is_fallback" => $is_fallback,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_table"));

            // line 166
            yield "    <table data-filters>
        <thead>
            <tr>
                <th data-filter=\"locale\">Locale</th>
                ";
            // line 170
            if ((($tmp = ($context["is_fallback"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 171
                yield "                    <th>Fallback locale</th>
                ";
            }
            // line 173
            yield "                <th data-filter=\"domain\">Domain</th>
                <th>Times used</th>
                <th>Message ID</th>
                <th>Message Preview</th>
            </tr>
        </thead>
        <tbody>
        ";
            // line 180
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["messages"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 181
                yield "            <tr data-filter-locale=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "locale", [], "any", false, false, false, 181), "html", null, true);
                yield "\" data-filter-domain=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "domain", [], "any", false, false, false, 181), "html", null, true);
                yield "\">
                <td class=\"font-normal text-small nowrap\">";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "locale", [], "any", false, false, false, 182), "html", null, true);
                yield "</td>
                ";
                // line 183
                if ((($tmp = ($context["is_fallback"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 184
                    yield "                    <td class=\"font-normal text-small nowrap\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "fallbackLocale", [], "any", true, true, false, 184)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "fallbackLocale", [], "any", false, false, false, 184), "-")) : ("-")), "html", null, true);
                    yield "</td>
                ";
                }
                // line 186
                yield "                <td class=\"font-normal text-small text-bold nowrap\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "domain", [], "any", false, false, false, 186), "html", null, true);
                yield "</td>
                <td class=\"font-normal text-small nowrap\">";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "count", [], "any", false, false, false, 187), "html", null, true);
                yield "</td>
                <td>
                    <span class=\"nowrap\">";
                // line 189
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, false, 189), "html", null, true);
                yield "</span>

                    ";
                // line 191
                if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["message"], "transChoiceNumber", [], "any", false, false, false, 191))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 192
                    yield "                        <small class=\"newline\">(pluralization is used)</small>
                    ";
                }
                // line 194
                yield "
                    ";
                // line 195
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "parameters", [], "any", false, false, false, 195)) > 0)) {
                    // line 196
                    yield "                        <button class=\"btn-link newline text-small sf-toggle\" data-toggle-selector=\"#parameters-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 196), "html", null, true);
                    yield "\" data-toggle-alt-content=\"Hide parameters\">Show parameters</button>

                        <div id=\"parameters-";
                    // line 198
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 198), "html", null, true);
                    yield "\" class=\"hidden\">
                            ";
                    // line 199
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "parameters", [], "any", false, false, false, 199));
                    foreach ($context['_seq'] as $context["_key"] => $context["parameters"]) {
                        // line 200
                        yield "                                ";
                        yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, $context["parameters"], 1);
                        yield "
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['parameters'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 202
                    yield "                        </div>
                    ";
                }
                // line 204
                yield "                </td>
                <td class=\"prewrap\">";
                // line 205
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "translation", [], "any", false, false, false, 205), "html", null, true);
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
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 208
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
        return "@WebProfiler/Collector/translation.html.twig";
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
        return array (  641 => 208,  624 => 205,  621 => 204,  617 => 202,  608 => 200,  604 => 199,  600 => 198,  594 => 196,  592 => 195,  589 => 194,  585 => 192,  583 => 191,  578 => 189,  573 => 187,  568 => 186,  562 => 184,  560 => 183,  556 => 182,  549 => 181,  532 => 180,  523 => 173,  519 => 171,  517 => 170,  511 => 166,  495 => 165,  484 => 151,  474 => 150,  463 => 129,  453 => 128,  442 => 108,  432 => 107,  418 => 154,  415 => 153,  412 => 150,  406 => 146,  404 => 145,  390 => 136,  386 => 135,  381 => 132,  378 => 131,  375 => 128,  369 => 124,  367 => 123,  354 => 115,  348 => 111,  345 => 110,  342 => 107,  336 => 103,  334 => 102,  324 => 95,  320 => 94,  316 => 92,  310 => 91,  307 => 90,  304 => 89,  301 => 88,  298 => 87,  295 => 86,  292 => 85,  289 => 84,  284 => 83,  281 => 82,  278 => 80,  268 => 79,  259 => 162,  256 => 161,  253 => 79,  247 => 75,  245 => 74,  236 => 68,  232 => 67,  225 => 63,  219 => 59,  209 => 58,  200 => 55,  194 => 52,  191 => 51,  188 => 50,  186 => 49,  181 => 47,  174 => 46,  164 => 45,  153 => 41,  150 => 40,  143 => 37,  134 => 31,  130 => 30,  121 => 24,  117 => 23,  109 => 18,  104 => 15,  102 => 14,  99 => 13,  92 => 11,  89 => 10,  87 => 9,  82 => 8,  79 => 7,  76 => 6,  66 => 5,  58 => 1,  56 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/translation.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/translation.html.twig");
    }
}
