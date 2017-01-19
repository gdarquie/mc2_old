<?php

namespace CmsBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;

/**
 * @Route("admin")
 */
class AdminController extends Controller
{

    /**
     * @Route("", name="admin")
     */
    public function adminAction()
    {

        $em = $this->getDoctrine()->getManager();

        //all les users
        $users = $em->getRepository('AppBundle:User')->findAll();

        //number of numbers by users
        $query = $em->createQuery(
            'SELECT COUNT(n) as nb, u.username as name FROM AppBundle:Number n JOIN n.editors u GROUP by u ORDER BY nb DESC'
        );
        $numbersByEditor = $query->getResult();

        //last numbers
        $query = $em->createQuery(
            'SELECT n FROM AppBundle:Number n WHERE n.date_creation is NOT null ORDER by n.last_update DESC '
        );
        $query->setMaxResults(20);
        $lastNumbers = $query->getResult();

        //number by month
        $query = $em->createQuery(
            'SELECT n.title as title, COUNT(n.title) as nb, SUBSTRING(n.last_update, 9, 2) as day, SUBSTRING(n.last_update, 6,2) as month, SUBSTRING(n.last_update, 1,4) as year FROM AppBundle:Number n WHERE n.last_update > 0 GROUP BY month , day'

        );
        $numberByMonth = $query->getResult();

        return $this->render('CmsBundle:Admin:index.html.twig', array(
            'users' => $users,
            'numbersByEditor' => $numbersByEditor,
            'lastNumbers' => $lastNumbers,
            'numberByMonth' => $numberByMonth,
        ));
    }



}

