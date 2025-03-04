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

/* TablaPJML.php */
class __TwigTemplate_918f09b8b381f7610b85ce4cc142493a extends Template
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
        // line 1
        yield "<?php
namespace App\\Entity;
use Doctrine\\ORM\\Mapping as ORM;
#[ORM\\Entity]
#[ORM\\Table(name: \"secretosPJML\")]
class TablaPJML
{
#[ORM\\Id]
#[ORM\\GeneratedValue]
#[ORM\\Column(type: \"integer\")]
private int \$id;
#[ORM\\Column(type: \"string\", length: 255)]
private string \$frasePJML;
public function getId(): int
{
return \$this->id;
}
public function getFrasePJML(): string
{
return \$this->frasePJML;
}
public function setFrasePJML(string \$frasePJML): self
{
\$this->frasePJML = \$frasePJML;
return \$this;
}
}";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "TablaPJML.php";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "TablaPJML.php", "/var/www/html/templates/TablaPJML.php");
    }
}
