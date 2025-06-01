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

/* @WebProfiler/Collector/events.html.twig */
class __TwigTemplate_8ca794d3bd0419f3a8608a45503aa215 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/events.html.twig"));

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
    public function block_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        yield "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Icon/event.svg");
        yield "</span>
    <strong>Events</strong>
</span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_panel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        yield "    <h2>Event Dispatcher</h2>

    ";
        // line 15
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "calledlisteners", [], "any", false, false, false, 15))) {
            // line 16
            yield "        <div class=\"empty\">
            <p>No events have been recorded. Check that debugging is enabled in the kernel.</p>
        </div>
    ";
        } else {
            // line 20
            yield "        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Called Listeners <span class=\"badge\">";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "calledlisteners", [], "any", false, false, false, 22)), "html", null, true);
            yield "</span></h3>

                <div class=\"tab-content\">
                    ";
            // line 25
            yield $macros["helper"]->getTemplateForMacro("macro_render_table", $context, 25, $this->getSourceContext())->macro_render_table(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "calledlisteners", [], "any", false, false, false, 25)]);
            yield "
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Not Called Listeners <span class=\"badge\">";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "notcalledlisteners", [], "any", false, false, false, 30)), "html", null, true);
            yield "</span></h3>
                <div class=\"tab-content\">
                    ";
            // line 32
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "notcalledlisteners", [], "any", false, false, false, 32))) {
                // line 33
                yield "                        <div class=\"empty\">
                            <p>
                                <strong>There are no uncalled listeners</strong>.
                            </p>
                            <p>
                                All listeners were called for this request or an error occurred
                                when trying to collect uncalled listeners (in which case check the
                                logs to get more information).
                            </p>
                        </div>
                    ";
            } else {
                // line 44
                yield "                        ";
                yield $macros["helper"]->getTemplateForMacro("macro_render_table", $context, 44, $this->getSourceContext())->macro_render_table(...[CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "notcalledlisteners", [], "any", false, false, false, 44)]);
                yield "
                    ";
            }
            // line 46
            yield "                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Orphaned Events <span class=\"badge\">";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "orphanedEvents", [], "any", false, false, false, 50)), "html", null, true);
            yield "</span></h3>
                <div class=\"tab-content\">
                    ";
            // line 52
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "orphanedEvents", [], "any", false, false, false, 52))) {
                // line 53
                yield "                        <div class=\"empty\">
                            <p>
                                <strong>There are no orphaned events</strong>.
                            </p>
                            <p>
                                All dispatched events were handled or an error occurred
                                when trying to collect orphaned events (in which case check the
                                logs to get more information).
                            </p>
                        </div>
                    ";
            } else {
                // line 64
                yield "                        <table>
                            <thead>
                                <tr>
                                    <th>Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
                // line 71
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["collector"] ?? null), "orphanedEvents", [], "any", false, false, false, 71));
                foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                    // line 72
                    yield "                                    <tr>
                                        <td class=\"font-normal\">";
                    // line 73
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["event"], "html", null, true);
                    yield "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                yield "                            </tbody>
                        </table>
                    ";
            }
            // line 79
            yield "                </div>
            </div>
        </div>
    ";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 85
    public function macro_render_table($listeners = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "listeners" => $listeners,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_table"));

            // line 86
            yield "    <table>
        <thead>
            <tr>
                <th class=\"text-right\">Priority</th>
                <th>Listener</th>
            </tr>
        </thead>

        ";
            // line 94
            $context["previous_event"] = CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["listeners"] ?? null)), "event", [], "any", false, false, false, 94);
            // line 95
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["listeners"] ?? null));
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
                // line 96
                yield "            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 96) || (CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "event", [], "any", false, false, false, 96) != ($context["previous_event"] ?? null)))) {
                    // line 97
                    yield "                ";
                    if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 98
                        yield "                    </tbody>
                ";
                    }
                    // line 100
                    yield "
                <tbody>
                    <tr>
                        <th colspan=\"2\" class=\"colored font-normal\">";
                    // line 103
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "event", [], "any", false, false, false, 103), "html", null, true);
                    yield "</th>
                    </tr>

                ";
                    // line 106
                    $context["previous_event"] = CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "event", [], "any", false, false, false, 106);
                    // line 107
                    yield "            ";
                }
                // line 108
                yield "
            <tr>
                <td class=\"text-right nowrap\">";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "priority", [], "any", true, true, false, 110)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "priority", [], "any", false, false, false, 110), "-")) : ("-")), "html", null, true);
                yield "</td>
                <td class=\"font-normal\">";
                // line 111
                yield $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["listener"], "stub", [], "any", false, false, false, 111));
                yield "</td>
            </tr>

            ";
                // line 114
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 115
                    yield "                </tbody>
            ";
                }
                // line 117
                yield "        ";
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
            // line 118
            yield "    </table>
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
        return "@WebProfiler/Collector/events.html.twig";
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
        return array (  325 => 118,  311 => 117,  307 => 115,  305 => 114,  299 => 111,  295 => 110,  291 => 108,  288 => 107,  286 => 106,  280 => 103,  275 => 100,  271 => 98,  268 => 97,  265 => 96,  247 => 95,  245 => 94,  235 => 86,  220 => 85,  208 => 79,  203 => 76,  194 => 73,  191 => 72,  187 => 71,  178 => 64,  165 => 53,  163 => 52,  158 => 50,  152 => 46,  146 => 44,  133 => 33,  131 => 32,  126 => 30,  118 => 25,  112 => 22,  108 => 20,  102 => 16,  100 => 15,  96 => 13,  86 => 12,  74 => 7,  71 => 6,  61 => 5,  53 => 1,  51 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Collector/events.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Collector/events.html.twig");
    }
}
