<?php
namespace Kay\Bundle\TagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function indexAction(Request $request)
    {
        $tagRepository = $this->getDoctrine()->getRepository('KayTagBundle:Tag');
        if ($q = $request->query->get('q')) {
            $tags = $tagRepository->search($q);
        } else {
            $tags = $tagRepository->fetchAllName();
        }
        $response = new JsonResponse();
        $response->setData($tags);
        return $response;
    }
}
