<?php

namespace Davebrend\RecruitisApiProject;

use Davebrend\RecruitisApiProject\DI\RecruitisApiExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
class RecruitisApiProject extends Bundle
{
    protected ExtensionInterface|null|false $extension = null;

    public function getContainerExtension(): ?ExtensionInterface
    {
        if ($this->extension === null) {
            $this->extension = new RecruitisApiExtension();
        }

        if ($this->extension === false) {
            return null;
        }

        return $this->extension;
    }
}