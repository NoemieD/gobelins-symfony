<?php

namespace VVM\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VVMUserBundle extends Bundle
{
    public function getParent() {
        return "FOSUserBundle";
    }
}
