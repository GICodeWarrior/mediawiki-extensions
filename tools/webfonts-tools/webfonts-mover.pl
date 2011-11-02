#!/usr/bin/perl

use 5.010;

use strict;
use warnings;

use English '-no_match_vars';
use Getopt::Long;
use Carp;
use File::Find;
use File::Basename;
use File::Path 'make_path';
use File::Copy;
use Cwd 'abs_path';

our $VERSION = 0.1;

my $program_name = __FILE__;

my %source_fonts;
my %fonts_to_move;
my %affected_system_dirs;

my $source_fonts_dir  = '../../extensions/WebFonts/fonts';
my $removed_fonts_dir = 'removed_fonts';
my $system_fonts_dir  = '/usr/share/fonts';
my $dry               = 0;
my $restore           = 0;

my $getopt_success = GetOptions(
    'source_fonts_dir=s'  => \$source_fonts_dir,
    'removed_fonts_dir=s' => \$removed_fonts_dir,
    'dry'                 => \$dry,
    'restore'             => \$restore,
);

if (not $getopt_success) {
    croak('Fatal error reading command-line options. Exiting.');
}

$source_fonts_dir = abs_path($source_fonts_dir);

File::Find::find(\&source_fonts, $source_fonts_dir);

move_fonts($restore ? 'system' : 'removed');

# Rebuild the cache
foreach my $system_dir (keys %affected_system_dirs) {
    if ($restore) {
        $system_dir =~ s{\A$removed_fonts_dir}{$system_fonts_dir}xms;
    }
    say "$program_name: rebuilding cache for dir $system_dir";
    if (not $dry) {
        system "fc-cache -fv $system_dir";
    }
}

exit;

sub move_fonts {
    my ($target) = @_;

    File::Find::find(\&fonts_to_move,
        $restore ? $removed_fonts_dir : $system_fonts_dir);
    FONT_TO_MOVE:
    foreach my $font_to_move (keys %fonts_to_move) {
        my $target_dir = dirname($font_to_move);
        if ($restore) {
            $target_dir =~ s{\A$removed_fonts_dir}{$system_fonts_dir}xms;
        }
        else {
            $target_dir =~ s{\A$system_fonts_dir}{$removed_fonts_dir}xms;
        }

        say "$program_name: moving $font_to_move to $target_dir";
        if (not $dry) {
            if (not -d $target_dir) {
                make_path($target_dir, { verbose => 1 });
            }
            move($font_to_move, $target_dir);
        }
    }

    return;
}

# Callback for File::Find
sub source_fonts {
    if (/^.*[.]ttf\z/ixms) {
        $source_fonts{ basename($File::Find::name) } =
            abs_path($File::Find::name);
    }

    return;
}

# Callback for File::Find
sub fonts_to_move {
    my $basename = basename($File::Find::name);
    my $dirname  = dirname($File::Find::name);

    if (exists $source_fonts{$basename}) {
        $fonts_to_move{$File::Find::name} = 0;
        say "$program_name: found $basename in dir $dirname";
        $affected_system_dirs{$dirname} = 0;
    }

    return;
}

__END__

