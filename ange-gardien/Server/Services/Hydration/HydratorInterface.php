<?php

namespace Server\Services\Hydration;

interface HydratorInterface {
	public function hydrate($valeurs,$entity);
}