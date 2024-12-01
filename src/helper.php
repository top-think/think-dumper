<?php

use Symfony\Component\VarDumper\Caster\ScalarStub;
use think\dumper\Dumper;

function d(mixed ...$vars): mixed
{
    if (!$vars) {
        Dumper::dump(new ScalarStub('🐛'));

        return null;
    }

    if (array_key_exists(0, $vars) && 1 === count($vars)) {
        Dumper::dump($vars[0]);
        $k = 0;
    } else {
        foreach ($vars as $k => $v) {
            Dumper::dump($v, is_int($k) ? 1 + $k : $k);
        }
    }

    if (1 < count($vars)) {
        return $vars;
    }

    return $vars[$k];
}
