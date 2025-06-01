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

/* @WebProfiler/Profiler/toolbar_js.html.twig */
class __TwigTemplate_61b4335742b3fd8947ccaab227b09a1e extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/toolbar_js.html.twig"));

        // line 1
        yield "<div id=\"sfwdt";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["token"] ?? null), "html", null, true);
        yield "\" class=\"sf-toolbar sf-display-none\" role=\"region\" aria-label=\"Symfony Web Debug Toolbar\">
    ";
        // line 2
        yield from $this->load("@WebProfiler/Profiler/toolbar.html.twig", 2)->unwrap()->yield(CoreExtension::merge($context, ["templates" => ["request" => "@WebProfiler/Profiler/cancel.html.twig"], "profile" => null, "profiler_url" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("_profiler", ["token" =>         // line 7
($context["token"] ?? null)]), "profiler_markup_version" => 2]));
        // line 10
        yield "</div>

";
        // line 12
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/base_js.html.twig");
        yield "

<style";
        // line 14
        if ((($tmp = ($context["csp_style_nonce"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " nonce=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csp_style_nonce"] ?? null), "html", null, true);
            yield "\"";
        }
        yield ">
    ";
        // line 15
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@WebProfiler/Profiler/toolbar.css.twig");
        yield "
</style>
<script";
        // line 17
        if ((($tmp = ($context["csp_script_nonce"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " nonce=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["csp_script_nonce"] ?? null), "html", null, true);
            yield "\"";
        }
        yield ">/*<![CDATA[*/
    (function () {
        Sfjs.loadToolbar('";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["token"] ?? null), "html", null, true);
        yield "');
    })();
/*]]>*/</script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@WebProfiler/Profiler/toolbar_js.html.twig";
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
        return array (  84 => 19,  75 => 17,  70 => 15,  62 => 14,  57 => 12,  53 => 10,  51 => 7,  50 => 2,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@WebProfiler/Profiler/toolbar_js.html.twig", "/var/www/html/vendor/symfony/web-profiler-bundle/Resources/views/Profiler/toolbar_js.html.twig");
    }
}
