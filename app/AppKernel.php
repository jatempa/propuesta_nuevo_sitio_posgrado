<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new DEPI\PortadaBundle\PortadaBundle(),
            new DEPI\InvestigadoresBundle\InvestigadoresBundle(),
            new DEPI\AlumnosBundle\AlumnosBundle(),
            new DEPI\ProyectosBundle\ProyectosBundle(),
            new DEPI\LineasInvestigacionBundle\LineasInvestigacionBundle(),
            new DEPI\AlumnosProyectosBundle\AlumnosProyectosBundle(),
            new DEPI\InvestigadoresLineasBundle\InvestigadoresLineasBundle(),
            new DEPI\AreasBundle\AreasBundle(),
            new DEPI\AreasProyectosBundle\AreasProyectosBundle(),
            new DEPI\ProductosAcademicosBundle\ProductosAcademicosBundle(),
            new DEPI\ProyectosProductosBundle\ProyectosProductosBundle(),
            new DEPI\InvestigadorProyectoBundle\InvestigadorProyectoBundle(),
            new DEPI\BackEndBundle\BackEndBundle(),
            new DEPI\NoticiasBundle\NoticiasBundle(),
            new DEPI\PosgradosBundle\PosgradosBundle(),
            new DEPI\PosgradoAlumnosBundle\PosgradoAlumnosBundle(),
            new DEPI\PosgradoAreasBundle\PosgradoAreasBundle(),
            new DEPI\PosgradoLineasBundle\PosgradoLineasBundle(),
            new DEPI\PosgradoInvestigadoresBundle\PosgradoInvestigadoresBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
