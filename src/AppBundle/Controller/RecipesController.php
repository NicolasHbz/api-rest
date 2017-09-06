<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RecipesRecipe;
use AppBundle\Form\RecipesRecipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;


class RecipesController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"recipes"})
     * @Rest\Get("/recipes.json")
     */
    public function getRecipesAction(Request $request)
    {
        $recipes = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:RecipesRecipe')
            ->findAll();

        /* @var $recipes RecipesRecipe */
        if (empty($recipes)) {
            return new JsonResponse(['message' => 'recipes not found'], Response::HTTP_NOT_FOUND);
        }

        return ["code" => 200,
            "message" => "success",
            "datas" => $recipes];
    }
    /**
     * @Rest\View(serializerGroups={"recipesByName"})
     * @Rest\Get("/recipes/{name}")
     */
    public function getRecipesByNameAction(Request $request)
    {
        $name = explode('.', $request->get('name'))[0];
        $recipes = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:RecipesRecipe')
            ->findOneBy(array('slug' => $name));

        /* @var $recipes RecipesRecipe */
        if (empty($recipes)) {
            return new JsonResponse(['message' => 'recipes not found'], Response::HTTP_NOT_FOUND);
        }

        return ["code" => 200,
            "message" => "success",
            "datas" => $recipes];
    }

    /**
     * @Rest\View(serializerGroups={"user_recipes"})
     * @Rest\GET("/users/{name}/recipes.json")
     */
    public function postRecipesByUserAction(Request $request)
    {
        $recipes = $this->get('doctrine.orm.entity_manager')
            ->createQueryBuilder()
            ->select(['r.id', 'r.name', 'r.slug'])
            ->from('AppBundle:RecipesRecipe', 'r')
            ->innerJoin('r.user', 'ru')
            ->where('ru.username = :name')->setParameter('name', $request->get('name'))
            ->getQuery()
            ->getScalarResult();
        /* @var $recipes RecipesRecipe */


        if (empty($recipes)) {
            return new JsonResponse(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }

        return ["code" => 200,
            "message" => "success",
            "datas" => $recipes];
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED, serializerGroups={"new_recipe"})
     * @Rest\Post("/users/{name}/recipes.json")
     */
    public function postStageAction(Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:UsersUser')
            ->findOneBy(array('username' => $request->get('name')));
        /* @var $user UsersUser */

        if (empty($user)) {
            return new JsonResponse(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }

        $recipes = new RecipesRecipe();
        $form = $this->createForm(RecipesRecipeType::class, $recipes);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $recipes->setUser($user);
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($recipes);
            $em->flush();
            return $recipes;
        } else {
            return $form;
        }
    }
}