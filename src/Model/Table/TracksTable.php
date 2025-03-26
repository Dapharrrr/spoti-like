<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tracks Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 *
 * @method \App\Model\Entity\Track newEmptyEntity()
 * @method \App\Model\Entity\Track newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Track> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Track get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Track findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Track patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Track> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Track|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Track saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Track>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Track>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Track>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Track> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Track>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Track>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Track>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Track> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TracksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tracks');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->integer('album_id')
            ->notEmptyString('album_id');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 255)
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->integer('artist_id')
            ->notEmptyString('artist_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['album_id'], 'Albums'), ['errorField' => 'album_id']);
        $rules->add($rules->existsIn(['artist_id'], 'Artists'), ['errorField' => 'artist_id']);

        return $rules;
    }
}
