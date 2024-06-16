<?php

namespace Davebrend\RecruitisApiProject;

use Davebrend\RecruitisApiProject\DI\RecruitisApiExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
class RecruitisApiProject extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if ($this->extension === null) {
            $this->extension = new RecruitisApiExtension();
        }

        return $this->extension;
    }
}