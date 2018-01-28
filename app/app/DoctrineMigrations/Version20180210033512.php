<?php declare(strict_types = 1);

namespace App\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180210033512 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE provider_source_source (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(100) NOT NULL, trade_name VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, ubigeo VARCHAR(9) NOT NULL, document_type VARCHAR(10) NOT NULL, document_number VARCHAR(15) NOT NULL, entity_id VARCHAR(36) NOT NULL, entity_name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_bankdetail_bankaccount (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', bank_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', provider_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', type SMALLINT NOT NULL, money SMALLINT NOT NULL, holder_name VARCHAR(50) NOT NULL, number_number VARCHAR(25) NOT NULL, number_interbank VARCHAR(25) NOT NULL, INDEX IDX_86923C5F11C8FB41 (bank_id), INDEX IDX_86923C5FA53A8AA (provider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_product_providerproduct (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', provider_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', product_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', level SMALLINT NOT NULL, INDEX IDX_99F09853A53A8AA (provider_id), INDEX IDX_99F098534584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_item (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', description VARCHAR(50) NOT NULL, code VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_information_email (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', provider_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', email VARCHAR(50) NOT NULL, INDEX IDX_E7DED1CCA53A8AA (provider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_bankdetail (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_type (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', description VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_information_phone (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', provider_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', number VARCHAR(15) NOT NULL, type SMALLINT NOT NULL, INDEX IDX_44033A65A53A8AA (provider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_provider (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', source_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', contac_name VARCHAR(50) NOT NULL, page_web VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_DA861D75953C1C61 (source_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', product_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', document_type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', paid_at DATETIME NOT NULL, document_number VARCHAR(50) NOT NULL, document_status SMALLINT NOT NULL, amount NUMERIC(2, 0) NOT NULL, amount_type SMALLINT NOT NULL, INDEX IDX_6D28840D4584665A (product_id), INDEX IDX_6D28840D61232A4F (document_type_id), INDEX IDX_6D28840DC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_document_type (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', description VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_product (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', item_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(50) NOT NULL, INDEX IDX_2931F1D126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE provider_bankdetail_bankaccount ADD CONSTRAINT FK_86923C5F11C8FB41 FOREIGN KEY (bank_id) REFERENCES provider_bankdetail (id)');
        $this->addSql('ALTER TABLE provider_bankdetail_bankaccount ADD CONSTRAINT FK_86923C5FA53A8AA FOREIGN KEY (provider_id) REFERENCES provider_provider (id)');
        $this->addSql('ALTER TABLE provider_product_providerproduct ADD CONSTRAINT FK_99F09853A53A8AA FOREIGN KEY (provider_id) REFERENCES provider_provider (id)');
        $this->addSql('ALTER TABLE provider_product_providerproduct ADD CONSTRAINT FK_99F098534584665A FOREIGN KEY (product_id) REFERENCES product_product (id)');
        $this->addSql('ALTER TABLE provider_information_email ADD CONSTRAINT FK_E7DED1CCA53A8AA FOREIGN KEY (provider_id) REFERENCES provider_provider (id)');
        $this->addSql('ALTER TABLE provider_information_phone ADD CONSTRAINT FK_44033A65A53A8AA FOREIGN KEY (provider_id) REFERENCES provider_provider (id)');
        $this->addSql('ALTER TABLE provider_provider ADD CONSTRAINT FK_DA861D75953C1C61 FOREIGN KEY (source_id) REFERENCES provider_source_source (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D4584665A FOREIGN KEY (product_id) REFERENCES product_product (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D61232A4F FOREIGN KEY (document_type_id) REFERENCES payment_document_type (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DC54C8C93 FOREIGN KEY (type_id) REFERENCES payment_type (id)');
        $this->addSql('ALTER TABLE product_product ADD CONSTRAINT FK_2931F1D126F525E FOREIGN KEY (item_id) REFERENCES product_item (id)');
        $this->addSql('ALTER TABLE ubigeo CHANGE id id CHAR(8) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE provider_provider DROP FOREIGN KEY FK_DA861D75953C1C61');
        $this->addSql('ALTER TABLE product_product DROP FOREIGN KEY FK_2931F1D126F525E');
        $this->addSql('ALTER TABLE provider_bankdetail_bankaccount DROP FOREIGN KEY FK_86923C5F11C8FB41');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DC54C8C93');
        $this->addSql('ALTER TABLE provider_bankdetail_bankaccount DROP FOREIGN KEY FK_86923C5FA53A8AA');
        $this->addSql('ALTER TABLE provider_product_providerproduct DROP FOREIGN KEY FK_99F09853A53A8AA');
        $this->addSql('ALTER TABLE provider_information_email DROP FOREIGN KEY FK_E7DED1CCA53A8AA');
        $this->addSql('ALTER TABLE provider_information_phone DROP FOREIGN KEY FK_44033A65A53A8AA');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D61232A4F');
        $this->addSql('ALTER TABLE provider_product_providerproduct DROP FOREIGN KEY FK_99F098534584665A');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D4584665A');
        $this->addSql('DROP TABLE provider_source_source');
        $this->addSql('DROP TABLE provider_bankdetail_bankaccount');
        $this->addSql('DROP TABLE provider_product_providerproduct');
        $this->addSql('DROP TABLE product_item');
        $this->addSql('DROP TABLE provider_information_email');
        $this->addSql('DROP TABLE provider_bankdetail');
        $this->addSql('DROP TABLE payment_type');
        $this->addSql('DROP TABLE provider_information_phone');
        $this->addSql('DROP TABLE provider_provider');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE payment_document_type');
        $this->addSql('DROP TABLE product_product');
        $this->addSql('ALTER TABLE ubigeo CHANGE id id CHAR(8) NOT NULL COLLATE utf8_unicode_ci');
    }
}
