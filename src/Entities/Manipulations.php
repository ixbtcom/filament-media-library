<?php

namespace Codedor\Attachments\Entities;

use Codedor\Attachments\Enums\Flip;
use Codedor\Attachments\Enums\Orientation;

class Manipulations
{
    public const CROP_TOP_LEFT = 'crop-top-left';
    public const CROP_TOP = 'crop-top';
    public const CROP_TOP_RIGHT = 'crop-top-right';
    public const CROP_LEFT = 'crop-left';
    public const CROP_CENTER = 'crop-center';
    public const CROP_RIGHT = 'crop-right';
    public const CROP_BOTTOM_LEFT = 'crop-bottom-left';
    public const CROP_BOTTOM = 'crop-bottom';
    public const CROP_BOTTOM_RIGHT = 'crop-bottom-right';

    public const ORIENTATION_AUTO = 'auto';
    public const ORIENTATION_0 = 0;
    public const ORIENTATION_90 = 90;
    public const ORIENTATION_180 = 180;
    public const ORIENTATION_270 = 270;

    public const FLIP_HORIZONTALLY = 'h';
    public const FLIP_VERTICALLY = 'v';
    public const FLIP_BOTH = 'both';

    public const FIT_CONTAIN = 'contain';
    public const FIT_MAX = 'max';
    public const FIT_FILL = 'fill';
    public const FIT_FILL_MAX = 'fill-max';
    public const FIT_STRETCH = 'stretch';
    public const FIT_CROP = 'crop';

    public const BORDER_OVERLAY = 'overlay';
    public const BORDER_SHRINK = 'shrink';
    public const BORDER_EXPAND = 'expand';

    public const FORMAT_JPG = 'jpg';
    public const FORMAT_PJPG = 'pjpg';
    public const FORMAT_PNG = 'png';
    public const FORMAT_GIF = 'gif';
    public const FORMAT_WEBP = 'webp';
    public const FORMAT_AVIF = 'avif';
    public const FORMAT_TIFF = 'tiff';

    public const FILTER_GREYSCALE = 'greyscale';
    public const FILTER_SEPIA = 'sepia';

    public const UNIT_PIXELS = 'px';
    public const UNIT_PERCENT = '%';

    public const POSITION_TOP_LEFT = 'top-left';
    public const POSITION_TOP = 'top';
    public const POSITION_TOP_RIGHT = 'top-right';
    public const POSITION_LEFT = 'left';
    public const POSITION_CENTER = 'center';
    public const POSITION_RIGHT = 'right';
    public const POSITION_BOTTOM_LEFT = 'bottom-left';
    public const POSITION_BOTTOM = 'bottom';
    public const POSITION_BOTTOM_RIGHT = 'bottom-right';

    protected array $manipulations = [];

    public function orientation(string $orientation): static
    {
        $this->manipulations['orientation'] = $orientation;

        return $this;
    }

    public function flip(string $flip): static
    {
        $this->manipulations['flip'] = $flip;

        return $this;
    }

    public function cropWithFocal(int $width, int $height, int $x, int $y, float $zoom = 1): static
    {
        $this->crop("crop-$x-$y-$zoom", $width, $height);

        return $this;
    }

    public function crop(string $method, int $width, int $height): static
    {
        $this->width($width);
        $this->height($height);
        $this->manipulations['crop'] = $method;

        return $this;
    }

    public function width(int $width): static
    {
        $this->manipulations['width'] = $width;

        return $this;
    }

    public function height(int $height): static
    {
        $this->manipulations['height'] = $height;

        return $this;
    }

    public function fit(string $method, int $width, int $height): static
    {
        $this->width($width);
        $this->height($height);
        $this->manipulations['fit'] = $method;

        return $this;
    }

    public function brightness(int $brightness): static
    {
        $this->manipulations['brightness'] = $brightness;

        return $this;
    }

    public function gamma(float $gamma): static
    {
        $this->manipulations['gamma'] = $gamma;

        return $this;
    }

    public function contrast(int $contrast): static
    {
        $this->manipulations['contrast'] = $contrast;

        return $this;
    }

    public function sharpen(int $sharpen): static
    {
        $this->manipulations['sharpen'] = $sharpen;

        return $this;
    }

    public function blur(int $blur): static
    {
        $this->manipulations['blur'] = $blur;

        return $this;
    }

    public function pixelate(int $pixelate): static
    {
        $this->manipulations['pixelate'] = $pixelate;

        return $this;
    }

    public function sepia(): static
    {
        $this->filter(self::FILTER_SEPIA);

        return $this;
    }

    public function filter(string $filter): static
    {
        $this->manipulations['filter'] = $filter;

        return $this;
    }

    public function greyscale(): static
    {
        $this->filter(self::FILTER_GREYSCALE);

        return $this;
    }

    public function border(int $width, string $color, string $type = self::BORDER_OVERLAY): static
    {
        $this->manipulations['border'] = "$width,$color,$type";

        return $this;
    }

    public function quality(int $quality): static
    {
        $this->manipulations['quality'] = $quality;

        return $this;
    }

    public function format(string $format): static
    {
        $this->manipulations['format'] = $format;

        return $this;
    }
}