<?php
/**
 * Created by PhpStorm.
 * User: p42argea
 * Date: 20/03/19
 * Time: 22:13
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class luckynumber
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = random_int(0, 24);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}