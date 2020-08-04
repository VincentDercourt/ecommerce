<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200803144429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_product DROP INDEX UNIQ_C42DD1E14959723, ADD INDEX IDX_C42DD1E14959723 (product_type_id)');
        $this->addSql('ALTER TABLE content_category DROP INDEX UNIQ_54FBF32E12469DE2, ADD INDEX IDX_54FBF32E12469DE2 (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_category DROP INDEX IDX_54FBF32E12469DE2, ADD UNIQUE INDEX UNIQ_54FBF32E12469DE2 (category_id)');
        $this->addSql('ALTER TABLE content_product DROP INDEX IDX_C42DD1E14959723, ADD UNIQUE INDEX UNIQ_C42DD1E14959723 (product_type_id)');
    }
}
