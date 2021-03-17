# python data/xbrl/S100IX2R/XBRL/ReadXbrl.py
import glob
print('check')
def importEdinetXbrl():
    # xbrlFile = glob.glob('../data/xbrl/XBRL/S100IX2R/PublicDoc/*.xbrl')
    xbrlFile = glob.glob('S100IX2R/PublicDoc/jpcrp030000-asr-001_E03296-000_2020-03-31_01_2020-06-26.xbrl')
    print(xbrlFile)

    print('check2')

def main():
    importEdinetXbrl()
    print("finish")

if __name__ == "__main__":
    main()
