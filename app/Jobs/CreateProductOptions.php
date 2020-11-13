<?php

namespace App\Jobs;

use App\Color;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreateProductOptions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Product
     */
    private $product;
    private $data;

    /**
     * Create a new job instance.
     *
     * @param Product $product
     * @param array $data
     */
    public function __construct(Product $product, $data)
    {

        $this->product = $product;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->prepareColorData();
        $this->product->load('options');
        $options = $this->product->options;
        foreach($this->data as $key => $value){
            $option = $options->firstWhere('key', $key);
            if($option){
                $option->value = trim($value);
                $option->save();
            } else {
                $this->product->options()->create(['key' => trim($key), 'value' => trim($value)]);
            }
        }

    }

    protected function prepareColorData()
    {
        foreach($this->data as $key => $value){
            if(Str::contains($key, 'color')){
                // First, get rid of the 'pan_color" key
                unset($this->data[$key]);
                $color = Color::firstOrCreate(['name' => $value, 'is_metallic' => Str::contains($value, ['Nickel', 'Chrome', 'Silver'])]);
                $fileName = Str::slug($value) . '.jpeg';
                if(!$color->media_count){
                    $url = 'https://pacific-bath-uploads.s3-us-west-2.amazonaws.com/colors/' . $fileName;
                    $color->addMediaFromUrl($url)->toMediaCollection('swatch');
                }
                // Then replace it with 'pan_color_id' instead
                $this->data[$key . "_id"] = $color->id;
            }
        }
    }
}
