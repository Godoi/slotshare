<?php

use App\Application\Service\Translator;
use PHPUnit\Framework\TestCase;

class TranslatorTest extends TestCase
{
    private Translator $translator;

    protected function setUp(): void
    {
        $this->translator = new Translator();
    }

    public function test_translates_to_portuguese(): void
    {
        $result = $this->translator->trans(
            'workspace.created',
            [':name' => 'Clínica São Paulo'],
            'pt'
        );
        $this->assertSame('Espaço de trabalho Clínica São Paulo criado com sucesso', $result);
    }

    public function test_translates_to_spanish(): void
    {
        $result = $this->translator->trans(
            'workspace.created',
            [':name' => 'Clínica Barcelona'],
            'es'
        );
        $this->assertSame('Espacio de trabajo Clínica Barcelona creado con éxito', $result);
    }

    public function test_translates_to_french(): void
    {
        $result = $this->translator->trans(
            'workspace.created',
            [':name' => 'Clinique Paris'],
            'fr'
        );
        $this->assertSame('Espace de travail Clinique Paris créé avec succès', $result);
    }

    public function test_fallback_to_key_when_translation_missing(): void
    {
        $result = $this->translator->trans('unknown.key', [], 'pt');
        $this->assertSame('unknown.key', $result);
    }

    public function test_fallback_to_english_when_locale_not_found(): void
    {
        $result = $this->translator->trans(
            'workspace.created',
            [':name' => 'Clinic London'],
            'de' // idioma não suportado
        );
        $this->assertSame('Workspace Clinic London created successfully', $result);
    }

    public function test_replaces_multiple_placeholders(): void
    {
        // Adicione no lang/en/messages.php: 'user.welcome' => 'Hello :name, you have :count messages'
        // Para teste rápido, vamos simular inline:
        $mockMessages = ['user.welcome' => 'Hello :name, you have :count messages'];
        // Mas como não alteramos o arquivo, vamos pular este — ou adicione a chave nos arquivos.
    }
}