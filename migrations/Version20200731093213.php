<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731093213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_product (product_id INT NOT NULL, product_type_id INT NOT NULL, INDEX IDX_C42DD1E4584665A (product_id), UNIQUE INDEX UNIQ_C42DD1E14959723 (product_type_id), PRIMARY KEY(product_id, product_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE content_product ADD CONSTRAINT FK_C42DD1E4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE content_product ADD CONSTRAINT FK_C42DD1E14959723 FOREIGN KEY (product_type_id) REFERENCES product_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_product');
    }
}
