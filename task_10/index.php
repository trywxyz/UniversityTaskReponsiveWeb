<?php
// Interface para os países
interface Pais {
    public function getIdioma();
}

// Classe para a Alemanha
class Alemanha implements Pais {
    public function getIdioma() {
        return "alemão";
    }
}

// Classe para o Japão
class Japao implements Pais {
    public function getIdioma() {
        return "japonês";
    }
}

// Classe Factory para criar os objetos
class IdiomaFactory {
    public static function criarIdioma($pais) {
        switch ($pais) {
            case "Alemanha":
                return new Alemanha();
            case "Japão":
                return new Japao();
            default:
                throw new Exception("País não suportado.");
        }
    }
}

// Execução do código
try {
    // Criando os objetos diretamente
    $idiomaAlemanha = IdiomaFactory::criarIdioma("Alemanha");
    $idiomaJapao = IdiomaFactory::criarIdioma("Japão");

    // Exibindo os idiomas na tela
    echo "O idioma desse país é " . $idiomaAlemanha->getIdioma() . "<br>";
    echo "E o idioma desse outro país é " . $idiomaJapao->getIdioma() . "<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
