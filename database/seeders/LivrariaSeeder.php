<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use Illuminate\Support\Str;

class LivrariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'name' => 'Harry Potter e a Pedra Filosofal',
            'author' => 'J.K. Rowling',
            'avaliação' => '(3293 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro1.png',
            'price' => '45.49',
            'desconto' => '59.90',
            'categoria' => 'Fantasia',
            'ano' => '1997',
            'porcentagem' => '25%',
            'editora' => 'Rocco',
            'slug' => Str::slug('Harry Potter e a Pedra Filosofal'),
            'descrição' => 'Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos. Inicialmente, Harry é impedido de ler a carta por seu tio, mas logo recebe a visita de Hagrid, o guarda-caça de Hogwarts, que chega para levá-lo até a escola. Harry adentra um mundo mágico que jamais imaginara, vivendo diversas aventuras com seus novos amigos, Rony Weasley e Hermione Granger.',
            'pagina' => '208',
            'idade' => '10',
            'dimensao' => '23x16x1.51cm',

        ]);
        Produto::create([
            'name' => 'It: a Coisa',
            'author' => 'Stephen King',
            'avaliação' => '(1338 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro2.png',
            'price' => '85.71',
            'desconto' => '114.90',
            'categoria' => 'Terror',
            'ano' => '1986',
            'porcentagem' => '26%',
            'editora' => 'Suma',
            'slug' => Str::slug('It: a Coisa'),
            'descrição' => 'Durante as férias de 1958, em uma pacata cidadezinha chamada Derry, um grupo de sete amigos começa a ver coisas estranhas. Um conta que viu um palhaço, outro que viu uma múmia. Finalmente, acabam descobrindo que estavam todos vendo a mesma coisa: um ser sobrenatural e maligno que pode assumir várias formas. É assim que Bill, Beverly, Eddie, Ben, Richie, Mike e Stan enfrentam a Coisa pela primeira vez. Quase trinta anos depois, o grupo volta a se encontrar. Mike, o único que permaneceu em Derry, dá o sinal ― uma nova onda de terror tomou a pequena cidade. É preciso unir forças novamente. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. Só eles podem vencer a Coisa.',
            'pagina' => '1104',
            'idade' => '18',
            'dimensao' => '16x23x3.91cm',

        ]);
        Produto::create([
            'name' => 'Os Sete Maridos de Evelyn Hugo',
            'author' => 'Taylor Jenkins Reid',
            'avaliação' => '(9023 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro3.jpg',
            'price' => '27.90',
            'desconto' => '59.90',
            'categoria' => 'Romance',
            'ano' => '2017',
            'porcentagem' => '55%',
            'editora' => 'Paralela',
            'slug' => Str::slug('Os Sete Maridos de Evelyn Hugo'),
            'descrição' => 'Lendária estrela de Hollywood, Evelyn Hugo sempre esteve sob os holofotes ― seja estrelando uma produção vencedora do Oscar, protagonizando algum escândalo ou aparecendo com um novo marido… pela sétima vez. Agora, prestes a completar oitenta anos e reclusa em seu apartamento no Upper East Side, a famigerada atriz decide contar a própria história ― ou sua “verdadeira história” ―, mas com uma condição: que Monique Grant, jornalista iniciante e até então desconhecida, seja a entrevistadora. Ao embarcar nessa misteriosa empreitada, a jovem repórter começa a se dar conta de que nada é por acaso.',
            'pagina' => '360',
            'idade' => '16',
            'dimensao' => '23x16x1.81cm',

        ]);
        Produto::create([
            'name' => 'As Crônicas de Nárnia',
            'author' => 'C.S. Lewis',
            'avaliação' => '(9543 avaliações)',
            'estrelas' => '4stars.png',
            'image' => 'livro4.png',
            'price' => '49.90',
            'desconto' => '104.90',
            'categoria' => 'Aventura',
            'ano' => '1950',
            'porcentagem' => '53%',
            'editora' => 'WMF Martins Fontes',
            'slug' => Str::slug('As Crônicas de Nárnia'),
            'descrição' => 'Durante os bombardeios da Segunda Guerra Mundial de Londres, quatro irmãos ingleses são enviados para uma casa de campo onde eles estarão seguros. Um dia, Lucy encontra um guarda-roupa que a transporta para um mundo mágico chamado Nárnia. Depois de voltar, ela logo volta a Nárnia com seus irmãos, Peter e Edmund, e sua irmã, Susan. Lá eles se juntam ao leão mágico, Aslan, na luta contra a Feiticeira Branca.',
            'pagina' => '752',
            'idade' => '10',
            'dimensao' => ' 22.8x15x4.4cm ',

        ]);
        Produto::create([
            'name' => 'A Culpa é das Estrelas',
            'author' => 'John Green',
            'avaliação' => '(5108 avaliações)',
            'estrelas' => '4stars.png',
            'image' => 'livro5.png',
            'price' => '45.10',
            'desconto' => '59.90',
            'categoria' => 'Drama',
            'ano' => '2012',
            'porcentagem' => '25%',
            'editora' => 'Intrínseca',
            'slug' => Str::slug('A Culpa é das Estrelas'),
            'descrição' => 'Narra o romance de dois adolescentes que se conhecem (e se apaixonam) em um Grupo de Apoio para Crianças com Câncer: Hazel, uma jovem de dezesseis anos que sobrevive graças a uma droga revolucionária que detém a metástase em seus pulmões, e Augustus Waters, de dezessete, ex-jogador de basquete que perdeu a perna para o osteosarcoma. Como Hazel, Gus é inteligente, tem ótimo senso de humor e gosta de brincar com os clichês do mundo do câncer – a principal arma dos dois para enfrentar a doença que lentamente drena a vida das pessoas.',
            'pagina' => '288',
            'idade' => '14',
            'dimensao' => '21x14x1.01cm',

        ]);
        Produto::create([
            'name' => 'Percy Jackson e o Ladrão de Raios',
            'author' => 'Rick Riordan',
            'avaliação' => '(8212 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro6.webp',
            'price' => '35.76',
            'desconto' => '59.90',
            'categoria' => 'Aventura',
            'ano' => '2005',
            'porcentagem' => '41%',
            'editora' => 'Intrínseca',
            'slug' => Str::slug('Percy Jackson e o Ladrão de Raios'),
            'descrição' => 'Um garoto de 12 anos com TDAH, descobre que os deuses do Olimpo estão mais vivos do que nunca e que é filho de Poseidon, o Senhor do Mar. O semideus segue em uma missão para encontrar quem roubou o raio-mestre de Zeus. Com a ajuda do sátiro Grover e de Annabeth, filha de Atena, Percy cruza os Estados Unidos para capturar o ladrão e evitar uma guerra no Olimpo.',
            'pagina' => '400',
            'idade' => '12',
            'dimensao' => '21x13.5x2cm',

        ]);
        Produto::create([
            'name' => 'O Homem de Giz',
            'author' => 'C.J. Tudor',
            'avaliação' => '(1946 avaliações)',
            'estrelas' => '3stars.png',
            'image' => 'livro7.jpg',
            'price' => '39.99',
            'desconto' => '69.90',
            'categoria' => 'Terror',
            'ano' => '2018',
            'porcentagem' => '43%',
            'editora' => 'Intrínseca',
            'slug' => Str::slug('O Homem de Giz'),
            'descrição' => 'Em 1986, Eddie e os amigos passam a maior parte dos dias andando de bicicleta pela pacata vizinhança em busca de aventuras. Os desenhos a giz são seu código secreto: homenzinhos rabiscados no asfalto; mensagens que só eles entendem. Mas um desenho misterioso leva o grupo de crianças até um corpo desmembrado e espalhado em um bosque. Depois disso, nada mais é como antes. Em 2016, Eddie se esforça para superar o passado, até que um dia ele e os amigos de infância recebem um mesmo aviso: o desenho de um homem de giz enforcado. Quando um dos amigos aparece morto, Eddie tem certeza de que precisa descobrir o que de fato aconteceu trinta anos atrás.',
            'pagina' => '272',
            'idade' => '18',
            'dimensao' => '23x15.5x1.51cm',

        ]);
        Produto::create([
            'name' => 'Arlindo',
            'author' => 'Ilustralu',
            'avaliação' => '(2112 avaliações)',
            'estrelas' => 'stars.png',
            'image' => 'livro8.jpeg',
            'price' => '42.84',
            'desconto' => '79.90',
            'categoria' => 'HQ',
            'ano' => '2021',
            'porcentagem' => '46%',
            'editora' => 'Seguinte',
            'slug' => Str::slug('Arlindo'),
            'descrição' => 'Arlindo é um garoto cheio de sonhos e vontade de encontrar seu lugar no mundo. Tudo o que ele quer é seguir sua vida de adolescente na cidadezinha onde mora, no interior do Rio Grande do Norte. Ele aluga filmes na locadora com as amigas todo sábado, sente o coração bater mais forte pelas primeiras paqueras, canta muito Sandy & Júnior no chuveiro, e ainda cuida da irmã mais nova e ajuda a mãe a fazer doces para vender. ',
            'pagina' => '200',
            'idade' => '12',
            'dimensao' => '18.8x1.2x27.6cm ',

        ]);
        Produto::create([
            'name' => 'O Pequeno Príncipe',
            'author' => 'Antoine de Saint-Exupéry',
            'avaliação' => '(7974 avaliações)',
            'estrelas' => '4stars.png',
            'image' => 'livro9.jpg',
            'price' => '15.22',
            'desconto' => '21.90',
            'categoria' => 'Infantil',
            'ano' => '1943',
            'porcentagem' => '30%',
            'editora' => 'Via Leitura',
            'slug' => Str::slug('O Pequeno Príncipe'),
            'descrição' => 'Publicado pela primeira vez em 1943, O Pequeno Príncipe é uma das obras clássicas mais traduzidas e vendidas de todos os tempos. Após uma pane em seu avião, um piloto cai no deserto do Saara e encontra um menino solitário e bastante peculiar que se autodenomina o "Pequeno Príncipe". Apesar de aparentemente toda a situação ser surreal, o que se estabelece entre o piloto e o pequeno príncipe é uma amizade genuína e comovente, e esse encontro nos ensinará muito mais sobre a natureza humana do que podemos imaginar.',
            'pagina' => '96',
            'idade' => '8',
            'dimensao' => '23x14x1.01cm',
        ]);
    }
}
