<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731093557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_type MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE content_type DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE content_type ADD category_id INT NOT NULL, ADD product_type_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE content_type ADD CONSTRAINT FK_41BCBAEC12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE content_type ADD CONSTRAINT FK_41BCBAEC14959723 FOREIGN KEY (product_type_id) REFERENCES product_type (id)');
        $this->addSql('CREATE INDEX IDX_41BCBAEC12469DE2 ON content_type (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_41BCBAEC14959723 ON content_type (product_type_id)');
        $this->addSql('ALTER TABLE content_type ADD PRIMARY KEY (category_id, product_type_id)');
        $this->addSql('ALTER TABLE content_category MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE content_category DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE content_category ADD product_id INT NOT NULL, ADD category_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE content_category ADD CONSTRAINT FK_54FBF32E4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE content_category ADD CONSTRAINT FK_54FBF32E12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_54FBF32E4584665A ON content_category (product_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_54FBF32E12469DE2 ON content_category (category_id)');
        $this->addSql('ALTER TABLE content_category ADD PRIMARY KEY (product_id, category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_category DROP FOREIGN KEY FK_54FBF32E4584665A');
        $this->addSql('ALTER TABLE content_category DROP FOREIGN KEY FK_54FBF32E12469DE2');
        $this->addSql('DROP INDEX IDX_54FBF32E4584665A ON content_category');
        $this->addSql('DROP INDEX UNIQ_54FBF32E12469DE2 ON content_category');
        $this->addSql('ALTER TABLE content_category ADD id INT AUTO_INCREMENT NOT NULL, DROP product_id, DROP category_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE content_type DROP FOREIGN KEY FK_41BCBAEC12469DE2');
        $this->addSql('ALTER TABLE content_type DROP FOREIGN KEY FK_41BCBAEC14959723');
        $this->addSql('DROP INDEX IDX_41BCBAEC12469DE2 ON content_type');
        $this->addSql('DROP INDEX UNIQ_41BCBAEC14959723 ON content_type');
        $this->addSql('ALTER TABLE content_type ADD id INT AUTO_INCREMENT NOT NULL, DROP category_id, DROP product_type_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
