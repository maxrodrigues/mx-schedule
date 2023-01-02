<?php

namespace App\Services;


use App\Repositories\Contracts\CompanyRepositoryContract;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class CompanyService implements CompanyServiceContract
{
    /**
     * __construct
     *
     * @param  CompanyRepositoryContract $companyRepository
     * @return void
     */
    public function __construct(private CompanyRepositoryContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompany($id): ?Model
    {
        return $this->companyRepository->findById($id);
    }


    /**
     * @param int $companyId
     * @param array $attributes
     * @return bool
     * @throws \JsonException
     */
    public function updateCompany(int $companyId, array $attributes): bool
    {
        $validatedFields = $this->validation($attributes);

        $validatedFields['slug'] = Str::slug($validatedFields['name']);
        $validatedFields['phone'] = removeMask('phone', $validatedFields['phone']);
        $validatedFields['document'] = removeMask('document', $validatedFields['document']);

        if ($this->slugExists($validatedFields['slug'])) {
            throw new Exception('o slug existe, escolhe outro ai ladrão');
        }

        return $this->companyRepository->update($companyId, $validatedFields);
    }

    /**
     * @param string $slug
     * @return bool
     */
    private function slugExists(string $slug): bool
    {
        if($this->companyRepository->slugExists($slug)){
            return true;
        }
        return false;
    }

    private function validation(array $attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'required',
            'document' => 'sometimes',
            'phone' => 'sometimes',
            'start_at' => 'sometimes',
            'finish_at' => 'sometimes',
            'start_lunch_at' => 'sometimes',
            'finish_lunch_at' => 'sometimes',
        ], [
            "name.required" => 'O nome é obrigatório caralho'
        ]);

        if($validator->fails()) {
            throw new \RuntimeException(json_encode($validator->messages()->messages(), JSON_THROW_ON_ERROR));
        }

        return $validator->validated();
    }
}
