<?php
namespace TuanQuynh\BusinessBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\DependencyInjection\Container;

class BaseFormType  extends AbstractType
{
  /**
   * @var Container
   */
  protected $container;

  /**
   * __construct
   *
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  /**
   * Get Service
   *
   * @param  string $name
   * @return Object Service
   */
  public function get($name)
  {
    return $this->container->get($name);
  }

  /**
   * Get Form Name
   *
   * @return string
   */
  public function getName(){}
}
