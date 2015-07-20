<?php

namespace TuanQuynh\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TuanQuynhUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
