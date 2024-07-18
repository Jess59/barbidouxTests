<?php

namespace App\Test\Controller;

use App\Entity\Hike;
use App\Repository\HikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HikeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private HikeRepository $repository;
    private string $path = '/admin/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Hike::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Hike index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'hike[idHike]' => 'Testing',
            'hike[nameHike]' => 'Testing',
            'hike[descHike]' => 'Testing',
            'hike[cityHike]' => 'Testing',
            'hike[timeHike]' => 'Testing',
            'hike[distHike]' => 'Testing',
            'hike[heightHike]' => 'Testing',
            'hike[downHike]' => 'Testing',
            'hike[difficultyHike]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Hike();
        $fixture->setIdHike('My Title');
        $fixture->setNameHike('My Title');
        $fixture->setDescHike('My Title');
        $fixture->setCityHike('My Title');
        $fixture->setTimeHike('My Title');
        $fixture->setDistHike('My Title');
        $fixture->setHeightHike('My Title');
        $fixture->setDownHike('My Title');
        $fixture->setDifficultyHike('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Hike');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Hike();
        $fixture->setIdHike('My Title');
        $fixture->setNameHike('My Title');
        $fixture->setDescHike('My Title');
        $fixture->setCityHike('My Title');
        $fixture->setTimeHike('My Title');
        $fixture->setDistHike('My Title');
        $fixture->setHeightHike('My Title');
        $fixture->setDownHike('My Title');
        $fixture->setDifficultyHike('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'hike[idHike]' => 'Something New',
            'hike[nameHike]' => 'Something New',
            'hike[descHike]' => 'Something New',
            'hike[cityHike]' => 'Something New',
            'hike[timeHike]' => 'Something New',
            'hike[distHike]' => 'Something New',
            'hike[heightHike]' => 'Something New',
            'hike[downHike]' => 'Something New',
            'hike[difficultyHike]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getIdHike());
        self::assertSame('Something New', $fixture[0]->getNameHike());
        self::assertSame('Something New', $fixture[0]->getDescHike());
        self::assertSame('Something New', $fixture[0]->getCityHike());
        self::assertSame('Something New', $fixture[0]->getTimeHike());
        self::assertSame('Something New', $fixture[0]->getDistHike());
        self::assertSame('Something New', $fixture[0]->getHeightHike());
        self::assertSame('Something New', $fixture[0]->getDownHike());
        self::assertSame('Something New', $fixture[0]->getDifficultyHike());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Hike();
        $fixture->setIdHike('My Title');
        $fixture->setNameHike('My Title');
        $fixture->setDescHike('My Title');
        $fixture->setCityHike('My Title');
        $fixture->setTimeHike('My Title');
        $fixture->setDistHike('My Title');
        $fixture->setHeightHike('My Title');
        $fixture->setDownHike('My Title');
        $fixture->setDifficultyHike('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/');
    }
}
