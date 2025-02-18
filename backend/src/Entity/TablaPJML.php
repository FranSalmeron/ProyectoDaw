<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: "secretosPJML")]
class TablaPJML
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type: "integer")]
private int $id;
#[ORM\Column(type: "string", length: 255)]
private string $frasePJML;
public function getId(): int
{
return $this->id;
}
public function getFrasePJML(): string
{
return $this->frasePJML;
}
public function setFrasePJML(string $frasePJML): self
{
$this->frasePJML = $frasePJML;
return $this;
}
}