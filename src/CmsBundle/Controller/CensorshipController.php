<?php

namespace CmsBundle\Controller;

use AppBundle\Entity\Censorship;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CensorshipController extends Controller
{
    /**
     * Effacer un item
     *
     * @Route("censorship/{id}/delete", name="censorship_delete")
     * @Method({"DELETE","GET"})
     */
    public function deleteAction(Censorship $censorship)
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if (!$censorship) {
            throw $this->createNotFoundException('No thesaurus found');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($censorship);
        $em->flush();

        $this->addFlash('success', 'Deleted Successfully!');
        return $this->redirectToRoute('admin');
    }
}
