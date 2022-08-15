<?php

final class Mix
{
  private static array $manifest;

  public static function version(string $filename, string $folder = 'dist'): string
  {
    $filename = self::withLeadingSlash($filename);
    $filename = self::manifest()[$filename] ?? $filename;

    return self::url($filename, $folder);
  }

  public static function manifest(): array
  {
    return self::$manifest ??= self::loadManifest();
  }

  private static function loadManifest(): array
  {
    $file = file_get_contents(
      self::path('dist/mix-manifest.json')
    );

    return json_decode($file, true, 512, JSON_THROW_ON_ERROR);

  }

  private static function url(string $url, ?string $prefix = null): string
  {
    if ($prefix) {
      return self::rootUrl() . self::withLeadingSlash($prefix). $url;
    }

    return self::rootUrl() . $url;
  }

  private static function path(string $path): string
  {
    return self::rootPath() . self::withLeadingSlash($path);
  }

  private static function withLeadingSlash(string $value): string
  {
    if (strpos($value , '/') !== 0) {
		    $value = "/$value";
	}

    return $value;
  }

  private static function rootPath(): string
  {
    return get_template_directory();
  }

  private static function rootUrl(): string
  {
    return get_template_directory_uri();
  }
}
