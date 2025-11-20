<?php

namespace App\Application\Service;

final class Translator
{
    /**
     * Traduz uma chave para o locale especificado, substituindo parâmetros.
     *
     * @param string $key Chave da mensagem (ex: 'workspace.created')
     * @param array $params Parâmetros para substituição (ex: [':name' => 'Clínica Madrid'])
     * @param string $locale Código do idioma (pt, en, es, fr)
     * @return string Mensagem traduzida
     */
    public function trans(string $key, array $params = [], string $locale = 'en'): string
    {
        $messages = $this->loadMessages($locale);
        $text = $messages[$key] ?? $key; // fallback: retorna a chave se não encontrar
        return str_replace(array_keys($params), array_values($params), $text);
    }

    /**
     * Carrega as mensagens de um locale específico.
     */
    private function loadMessages(string $locale): array
    {
        $path = __DIR__ . '/../../../lang/' . $locale . '/messages.php';
        if (!file_exists($path)) {
            $path = __DIR__ . '/../../../lang/en/messages.php'; // fallback para inglês
        }
        return require $path;
    }
}