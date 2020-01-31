<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130102242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3909E143A');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3AD96791B');
        $this->addSql('DROP INDEX IDX_F87474F3AD96791B ON lesson');
        $this->addSql('DROP INDEX IDX_F87474F3909E143A ON lesson');
        $this->addSql('ALTER TABLE lesson ADD training_id INT DEFAULT NULL, ADD instructeur_id INT DEFAULT NULL, DROP instructor_id_id, DROP training_id_id');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F325FCA809 FOREIGN KEY (instructeur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3BEFD98D1 ON lesson (training_id)');
        $this->addSql('CREATE INDEX IDX_F87474F325FCA809 ON lesson (instructeur_id)');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A735A24AD0');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7D3728193');
        $this->addSql('DROP INDEX IDX_62A8A7A735A24AD0 ON registration');
        $this->addSql('DROP INDEX IDX_62A8A7A7D3728193 ON registration');
        $this->addSql('ALTER TABLE registration ADD user_id INT DEFAULT NULL, ADD lesson_id INT DEFAULT NULL, DROP lesson_id_id, DROP person_id_id, CHANGE payment payment VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7A76ED395 ON registration (user_id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7CDF80196 ON registration (lesson_id)');
        $this->addSql('ALTER TABLE training CHANGE costs costs NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD dateofbirth DATE NOT NULL, ADD hiring_date VARCHAR(255) DEFAULT NULL, ADD salary NUMERIC(10, 2) DEFAULT NULL, ADD street VARCHAR(255) DEFAULT NULL, ADD postal_code VARCHAR(255) DEFAULT NULL, ADD place VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE preprovision preprovision VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6496D1A90C6 ON user (loginname)');
        $this->addSql('ALTER TABLE person CHANGE hiring_date hiring_date VARCHAR(255) DEFAULT NULL, CHANGE salary salary NUMERIC(10, 2) DEFAULT NULL, CHANGE street street VARCHAR(255) DEFAULT NULL, CHANGE postal_code postal_code VARCHAR(255) DEFAULT NULL, CHANGE place place VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3BEFD98D1');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F325FCA809');
        $this->addSql('DROP INDEX IDX_F87474F3BEFD98D1 ON lesson');
        $this->addSql('DROP INDEX IDX_F87474F325FCA809 ON lesson');
        $this->addSql('ALTER TABLE lesson ADD instructor_id_id INT DEFAULT NULL, ADD training_id_id INT DEFAULT NULL, DROP training_id, DROP instructeur_id');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3909E143A FOREIGN KEY (training_id_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3AD96791B FOREIGN KEY (instructor_id_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3AD96791B ON lesson (instructor_id_id)');
        $this->addSql('CREATE INDEX IDX_F87474F3909E143A ON lesson (training_id_id)');
        $this->addSql('ALTER TABLE person CHANGE hiring_date hiring_date VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE salary salary NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE street street VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE place place VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7A76ED395');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7CDF80196');
        $this->addSql('DROP INDEX IDX_62A8A7A7A76ED395 ON registration');
        $this->addSql('DROP INDEX IDX_62A8A7A7CDF80196 ON registration');
        $this->addSql('ALTER TABLE registration ADD lesson_id_id INT DEFAULT NULL, ADD person_id_id INT DEFAULT NULL, DROP user_id, DROP lesson_id, CHANGE payment payment SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A735A24AD0 FOREIGN KEY (lesson_id_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7D3728193 FOREIGN KEY (person_id_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A735A24AD0 ON registration (lesson_id_id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7D3728193 ON registration (person_id_id)');
        $this->addSql('ALTER TABLE training CHANGE costs costs NUMERIC(10, 2) DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_8D93D6496D1A90C6 ON user');
        $this->addSql('ALTER TABLE user DROP dateofbirth, DROP hiring_date, DROP salary, DROP street, DROP postal_code, DROP place, CHANGE preprovision preprovision VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
