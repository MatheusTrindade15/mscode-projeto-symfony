<?php

namespace App\Controller\Produto;

use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdicionarProdutoController extends AbstractController
{

    public function __construct(
        private ProdutoRepository $produtoRepository,
    ){}

    #[Route('/produto/add/{id}', name: 'adicionar_produto')]
    public function index(int|string $id): Response
    {
        $produto = $this->produtoRepository->find($id);

        $produto->setQuantidadeDisponivel($produto->getQuantidadeDisponivel() + 1);

        $this->produtoRepository->getEntityManager()->flush();

        return $this->redirectToRoute('listar_produtos');
    }
}
