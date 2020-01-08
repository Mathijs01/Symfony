<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191224114247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gedragsregels (id INT AUTO_INCREMENT NOT NULL, regels VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson ADD instructor_id_id INT DEFAULT NULL, ADD training_id_id INT DEFAULT NULL, CHANGE max_persons max_persons INT NOT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3AD96791B FOREIGN KEY (instructor_id_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3909E143A FOREIGN KEY (training_id_id) REFERENCES training (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3AD96791B ON lesson (instructor_id_id)');
        $this->addSql('CREATE INDEX IDX_F87474F3909E143A ON lesson (training_id_id)');
        $this->addSql('ALTER TABLE person ADD role VARCHAR(255) NOT NULL, ADD hiring_date VARCHAR(255) DEFAULT NULL, ADD salary NUMERIC(10, 2) DEFAULT NULL, ADD street VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(255) DEFAULT NULL, ADD place VARCHAR(255) DEFAULT NULL, CHANGE dateofbirth dateofbirth VARCHAR(255) NOT NULL, CHANGE emailadress emailaddress VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE registration ADD lesson_id_id INT DEFAULT NULL, ADD person_id_id INT DEFAULT NULL, CHANGE payment payment SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A735A24AD0 FOREIGN KEY (lesson_id_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7D3728193 FOREIGN KEY (person_id_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A735A24AD0 ON registration (lesson_id_id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7D3728193 ON registration (person_id_id)');
        $this->addSql('ALTER TABLE training CHANGE costs costs NUMERIC(10, 2) DEFAULT NULL, CHANGE name naam VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE gedragsregels');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3AD96791B');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3909E143A');
        $this->addSql('DROP INDEX IDX_F87474F3AD96791B ON lesson');
        $this->addSql('DROP INDEX IDX_F87474F3909E143A ON lesson');
        $this->addSql('ALTER TABLE lesson DROP instructor_id_id, DROP training_id_id, CHANGE max_persons max_persons VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE person ADD emailadress VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP emailaddress, DROP role, DROP hiring_date, DROP salary, DROP street, DROP postal_code, DROP place, CHANGE dateofbirth dateofbirth DATE NOT NULL');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A735A24AD0');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7D3728193');
        $this->addSql('DROP INDEX IDX_62A8A7A735A24AD0 ON registration');
        $this->addSql('DROP INDEX IDX_62A8A7A7D3728193 ON registration');
        $this->addSql('ALTER TABLE registration DROP lesson_id_id, DROP person_id_id, CHANGE payment payment VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE training CHANGE costs costs VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE naam name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
